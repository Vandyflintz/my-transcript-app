<?php
 error_reporting(0);
  ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
  
  $dir = "docs/";
  
   function formatbytes($bytes){
  if($bytes >= 1073741824){
  $bytes = number_format($bytes/ 1073741824, 2). ' GB';
  }
  else if($bytes >= 1048576){
  $bytes = number_format($bytes/ 1048576, 2). ' MB';
  }
  else if($bytes >= 1024){
  $bytes = number_format($bytes/ 1024, 2). ' KB';
  }
  else if($bytes < 1024){
  $bytes = $bytes. ' B';
  }
  
  return $bytes;
  }
  
     if(isset($_POST['getworkers'])){
	  $uid = encrypt($_POST['uid']);
	  $unread = encrypt("0");
	  $query = mysqli_query($dbcon, "SELECT * FROM `messages` left join students on (students.student_id = messages.sender or students.student_id = messages.receipient) where (messages.sender = '".$uid."' and messages.receipient= students.student_id) or (messages.sender = students.student_id and messages.receipient = '".$uid."') group by students.student_id");
	  
	  
	  
	  if(mysqli_num_rows($query)<1){
		  echo json_encode("no records found");
	  }else{
		 $arr = array();	
	  while($fetch = mysqli_fetch_assoc($query)){ 
	  $submessages = mysqli_query($dbcon,"SELECT * FROM `messages` WHERE (`sender` = '".$uid."' and receipient = '".$fetch['student_id']."') or (`sender` = '".$fetch['student_id']."' and receipient = '".$uid."') ORDER by `id` desc LIMIT 1");
	  
	  $msgcountquery = mysqli_query($dbcon, "SELECT *, count(messages.id) as msgc FROM `messages` WHERE  `sender` = '".$fetch['student_id']."' and sender != '".$uid."' and receipient = '".$uid."' and receipient != '".$fetch['student_id']."' and `rec_status` = '+b82aw/FHEpfVc9p01n6zw=='");
	  
	  $arrone = array();
	  $fname = decrypt($fetch['firstname']);
	  $lname = decrypt($fetch['lastname']);
	  $title = decrypt($fetch['title']);
	  $img = decrypt($fetch['image']);
	  $id = decrypt($fetch['student_id']);
	  $channel = decrypt($fetch['name']);
	  
		while($fetchone = mysqli_fetch_assoc($submessages)){
		$msg = decrypt($fetchone['message']);
		$arrone[] = array("message"=> $msg);
		array_push($arrone);
		}
		while($fetchtwo = mysqli_fetch_assoc($msgcountquery)){
		//echo decrypt($fetchtwo['sender'])." - ".$fetchtwo["msgc"]."\n\n";
		$mmsgcount = $fetchtwo['msgc'];
		if($fetchtwo['msgc']<1){
		$mmsgcount = "0";  
	  }else{
		$mmsgcount = $fetchtwo['msgc'];  
	  }
		$arrtwo[] = array("msgcount"=> $msgcount);
		array_push($arrtwo);
		}
		$fullname = $title." ".$fname." ".$lname;
		$arr[] = array("img"=>$img,"uid"=>$id,"username"=>$fullname,"channel"=>"Student","msgcount"=>$mmsgcount);
		array_push($arr);
		
	  }
		$name = array_column($arr, 'username');
		array_multisort($name, SORT_ASC, $arr);
	$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

	echo $myjson;
	  
	  }
	  
  }

	  if(isset($_POST['getadminmessages'])){
  //SEvjhtg7XfwkyEASwPTgpEDJtorURCkucG/U6Gnn2xw=
	  $uid = encrypt($_POST['uid']);
	  $unread = encrypt("0");
	  $query = mysqli_query($dbcon, "SELECT m.id as mid, m.`sender`, m.`receipient`, m.`message`, m.`messagetype`, m.`submessage`, m.`rec_status`, m.`send_status`, m.`timeofmsg`, count(m.id) as msgc, work_admins.firstname, work_admins.lastname, work_admins.title, work_admins.admin_id, work_admins.image FROM `messages` m inner join work_admins on (work_admins.admin_id = m.sender or work_admins.admin_id = m.receipient)   WHERE  ( sender = '".$uid."' and receipient != '".$uid."' and work_admins.admin_id != '".$uid."') or ( sender != '".$uid."' and receipient = '".$uid."' and work_admins.admin_id != '".$uid."')   GROUP by admin_id   ");
	  
	  if(mysqli_num_rows($query)<1){
		  echo json_encode("no records found");
	  }else{
		 $arr = array();	
	  while($fetch = mysqli_fetch_assoc($query)){ 
	  $submessages = mysqli_query($dbcon,"SELECT * FROM `messages` WHERE (`sender` = '".$uid."' and receipient = '".$fetch['admin_id']."') or (`sender` = '".$fetch['admin_id']."' and receipient = '".$uid."')  ORDER by `id` desc LIMIT 1");
	  
	  $msgcountquery = mysqli_query($dbcon, "SELECT *, count(messages.id) as msgc FROM `messages` WHERE  `sender` = '".$fetch['admin_id']."' and sender != '".$uid."' and receipient = '".$uid."' and receipient != '".$fetch['admin_id']."' and `rec_status` = '+b82aw/FHEpfVc9p01n6zw=='");
	  
	  $arrone = array();
	  $arrtwo = array();
	  $fname = decrypt($fetch['firstname']);
	  $lname = decrypt($fetch['lastname']);
	  $title = decrypt($fetch['title']);
	  $img = decrypt($fetch['image']);
	  $id = decrypt($fetch['admin_id']);
	  $lm = decrypt($fetch['lastmsg']);
	  
		while($fetchone = mysqli_fetch_assoc($submessages)){
		if(decrypt($fetchone['messagetype'])!=="text"){
		$msg = decrypt($fetchone['messagetype']);
		}else{
		$msg = decrypt($fetchone['message']);
		}
		$mtime = $fetchone["timeofmsg"];
		$arrone[] = array("message"=> $msg);
		array_push($arrone);
		}
		while($fetchtwo = mysqli_fetch_assoc($msgcountquery)){
		//echo decrypt($fetchtwo['sender'])." - ".$fetchtwo["msgc"]."\n\n";
		$mmsgcount = $fetchtwo['msgc'];
		if($fetchtwo['msgc']<1){
		$mmsgcount = "0";  
	  }else{
		$mmsgcount = $fetchtwo['msgc'];  
	  }
		$arrtwo[] = array("msgcount"=> $msgcount);
		array_push($arrtwo);
		}
		$fullname = $title." ".$fname." ".$lname;
		$arr[] = array("img"=>$img,"uid"=>$id,"msgcount"=>$mmsgcount,"username"=>$fullname,"lastmessage"=>$msg,"timeofmsg"=>$mtime);
		array_push($arr);
		
	  }
	ksort($arr, function($a, $b){
	$ad = new DateTime($a['timeofmsg']);
	$bd = new DateTime($b['timeofmsg']);
	if($ad == $bd){
	return 0;
	}
	return $ad < $bd ? -1 : 1;
	//return $a['timeofmsg'] <=> $b['timeofmsg'];
	});
	$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

	echo $myjson;
	  
	  }
	  
  }
  
  
  if(isset($_POST['getmessages'])){
  //SEvjhtg7XfwkyEASwPTgpEDJtorURCkucG/U6Gnn2xw=
	  $uid = encrypt($_POST['uid']);
	  $unread = encrypt("0");
	  $query = mysqli_query($dbcon, "SELECT mm.id as mid, mm.`sender`, mm.`receipient`, mm.`message`, mm.`messagetype`, mm.`submessage`, mm.`rec_status`, mm.`send_status`, mm.`timeofmsg`, count(mm.id) as msgc, students.firstname, students.lastname, students.title, students.student_id, students.image FROM `messages` mm inner join students on (students.student_id = mm.sender or students.student_id = mm.receipient)  WHERE (sender = '".$uid."' and receipient != '".$uid."' and students.student_id != '".$uid."') or (sender != '".$uid."' and receipient = '".$uid."' and students.student_id != '".$uid."') GROUP by student_id   ");
	  
	  if(mysqli_num_rows($query)<1){
		  echo json_encode("no records found");
	  }else{
		 $arr = array();	
	  while($fetch = mysqli_fetch_assoc($query)){ 
	  $submessages = mysqli_query($dbcon,"SELECT * FROM `messages` WHERE (`sender` = '".$uid."' and receipient = '".$fetch['student_id']."') or (`sender` = '".$fetch['student_id']."' and receipient = '".$uid."')  ORDER by `id` desc LIMIT 1");
	  
	  $msgcountquery = mysqli_query($dbcon, "SELECT *, count(messages.id) as msgc FROM `messages` WHERE  `sender` = '".$fetch['student_id']."' and sender != '".$uid."' and receipient = '".$uid."' and receipient != '".$fetch['student_id']."' and `rec_status` = '+b82aw/FHEpfVc9p01n6zw=='");
	  
	  $arrone = array();
	  $arrtwo = array();
	  $fname = decrypt($fetch['firstname']);
	  $lname = decrypt($fetch['lastname']);
	  $title = decrypt($fetch['title']);
	  $img = decrypt($fetch['image']);
	  $id = decrypt($fetch['student_id']);
	  $lm = decrypt($fetch['lastmsg']);
	  
		while($fetchone = mysqli_fetch_assoc($submessages)){
		if(decrypt($fetchone['messagetype'])!=="text"){
		$msg = decrypt($fetchone['messagetype']);
		}else{
		$msg = decrypt($fetchone['message']);
		}
		$mtime = $fetchone["timeofmsg"];
		$arrone[] = array("message"=> $msg);
		array_push($arrone);
		}
		while($fetchtwo = mysqli_fetch_assoc($msgcountquery)){
		//echo decrypt($fetchtwo['sender'])." - ".$fetchtwo["msgc"]."\n\n";
		$mmsgcount = $fetchtwo['msgc'];
		if($fetchtwo['msgc']<1){
		$mmsgcount = "0";  
	  }else{
		$mmsgcount = $fetchtwo['msgc'];  
	  }
		$arrtwo[] = array("msgcount"=> $msgcount);
		array_push($arrtwo);
		}
		$fullname = $title." ".$fname." ".$lname;
		$arr[] = array("img"=>$img,"uid"=>$id,"msgcount"=>$mmsgcount,"username"=>$fullname,"lastmessage"=>$msg,"timeofmsg"=>$mtime);
		array_push($arr);
		
	  }
	ksort($arr, function($a, $b){
	$ad = new DateTime($a['timeofmsg']);
	$bd = new DateTime($b['timeofmsg']);
	if($ad == $bd){
	return 0;
	}
	return $ad < $bd ? -1 : 1;
	//return $a['timeofmsg'] <=> $b['timeofmsg'];
	});
	$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

	echo $myjson;
	  
	  }
	  
  }
  
  
   if(isset($_POST['getadmins'])){
	  $uid = encrypt($_POST['uid']);
	  $unread = encrypt("0");
	  $query = mysqli_query($dbcon, "SELECT * FROM `work_admins`  WHERE admin_id != '".$uid."' ");
	  
	  if(mysqli_num_rows($query)<1){
		  echo json_encode("no records found");
	  }else{
		 $arr = array();	
	  while($fetch = mysqli_fetch_assoc($query)){ 
	  $submessages = mysqli_query($dbcon,"SELECT * FROM `messages` WHERE (`sender` = '".$uid."' and receipient = '".$fetch['admin_id']."') or (`sender` = '".$fetch['admin_id']."' and receipient = '".$uid."') ORDER by `id` desc LIMIT 1");
	  $arrone = array();
	  $fname = decrypt($fetch['firstname']);
	  $lname = decrypt($fetch['lastname']);
	  $title = decrypt($fetch['title']);
	  $img = decrypt($fetch['image']);
	  $id = decrypt($fetch['admin_id']);
	  $channel = decrypt($fetch['name']);
	  if(empty($fetch['name'])){
		$channel = "Administrator";  
	  }else{
		$channel = decrypt($fetch['name']);  
	  }
		while($fetchone = mysqli_fetch_assoc($submessages)){
		$msg = decrypt($fetchone['message']);
		$arrone[] = array("message"=> $msg);
		array_push($arrone);
		}
		$fullname = $title." ".$fname." ".$lname;
		$arr[] = array("img"=>$img,"uid"=>$id,"username"=>$fullname,"channel"=>$channel);
		array_push($arr);
		
	  }
		$name = array_column($arr, 'username');
		array_multisort($name, SORT_ASC, $arr);
	$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

	echo $myjson;
	  
	  }
	  
  }
  
  
    if(isset($_POST['updateread'])){
	$sender = encrypt($_POST['sender']);  
	$receipient = encrypt($_POST['receipient']);
	$read = encrypt("1");
	$query = mysqli_query($dbcon,"UPDATE `messages` SET `rec_status`='".$read."' WHERE `receipient` = '".$receipient."' and `sender` = '".$sender."'");
	if($query){
		echo json_encode("successful");
	}else{
		echo json_encode("error");
	}
  }
  
   if(isset($_POST['getsmessages'])){
  //SEvjhtg7XfwkyEASwPTgpEDJtorURCkucG/U6Gnn2xw=
	  $uid = encrypt($_POST['uid']);
	  
	  $unread = encrypt("0");
	  $query = mysqli_query($dbcon, "select * from(  SELECT m.id as mid, m.`sender`, m.`receipient`, m.`message`, m.`messagetype`, m.`submessage`, m.`rec_status`, m.`send_status`, m.`timeofmsg`, count(m.id) as msgc, work_admins.firstname, work_admins.lastname, work_admins.title, work_admins.admin_id, work_admins.image FROM `messages` m inner join work_admins on (work_admins.admin_id = m.sender or work_admins.admin_id = m.receipient)  WHERE  ( sender = '".$uid."' and receipient != '".$uid."' and work_admins.admin_id != '".$uid."') or ( sender != '".$uid."' and receipient = '".$uid."' and work_admins.admin_id != '".$uid."')   GROUP by admin_id  UNION

SELECT mm.id as mid, mm.`sender`, mm.`receipient`, mm.`message`, mm.`messagetype`, mm.`submessage`, mm.`rec_status`, mm.`send_status`, mm.`timeofmsg`, count(mm.id) as msgc, students.firstname, students.lastname, students.title, students.student_id, students.image FROM `messages` mm inner join students on (students.student_id = mm.sender or students.student_id = mm.receipient)  WHERE (sender = '".$uid."' and receipient != '".$uid."' and students.student_id != '".$uid."') or (sender != '".$uid."' and receipient = '".$uid."' and students.student_id != '".$uid."') GROUP by student_id ) as x order by mid desc  ");
	  
	  if(mysqli_num_rows($query)<1){
		  echo json_encode("no records found");
	  }else{
		 $arr = array();	
	  while($fetch = mysqli_fetch_assoc($query)){ 
	  $submessages = mysqli_query($dbcon,"SELECT * FROM `messages` WHERE (`sender` = '".$uid."' and receipient = '".$fetch['admin_id']."') or (`sender` = '".$fetch['admin_id']."' and receipient = '".$uid."') ORDER by `id` desc LIMIT 1");
	  
	  $msgcountquery = mysqli_query($dbcon, "SELECT *, count(messages.id) as msgc FROM `messages` WHERE  `sender` = '".$fetch['admin_id']."' and sender != '".$uid."' and receipient = '".$uid."' and receipient != '".$fetch['admin_id']."' and `rec_status` = '+b82aw/FHEpfVc9p01n6zw=='");
	  
	  $arrone = array();
	  $arrtwo = array();
	  $fname = decrypt($fetch['firstname']);
	  $lname = decrypt($fetch['lastname']);
	  $title = decrypt($fetch['title']);
	  $img = decrypt($fetch['image']);
	  $id = decrypt($fetch['admin_id']);
	  $lm = decrypt($fetch['lastmsg']);
	  
		while($fetchone = mysqli_fetch_assoc($submessages)){
		if(decrypt($fetchone['messagetype'])!=="text"){
		$msg = decrypt($fetchone['messagetype']);
		}else{
		$msg = decrypt($fetchone['message']);
		}
		$mtime = $fetchone["timeofmsg"];
		$arrone[] = array("message"=> $msg);
		array_push($arrone);
		}
		while($fetchtwo = mysqli_fetch_assoc($msgcountquery)){
		//echo decrypt($fetchtwo['sender'])." - ".$fetchtwo["msgc"]."\n\n";
		$mmsgcount = $fetchtwo['msgc'];
		if($fetchtwo['msgc']<1){
		$mmsgcount = "0";  
	  }else{
		$mmsgcount = $fetchtwo['msgc'];  
	  }
		$arrtwo[] = array("msgcount"=> $msgcount);
		array_push($arrtwo);
		}
		$fullname = $title." ".$fname." ".$lname;
		$arr[] = array("img"=>$img,"uid"=>$id,"msgcount"=>$mmsgcount,"username"=>$fullname,"lastmessage"=>$msg,"timeofmsg"=>$mtime);
		array_push($arr);
		
	  }
	ksort($arr, function($a, $b){
	$ad = new DateTime($a['timeofmsg']);
	$bd = new DateTime($b['timeofmsg']);
	if($ad == $bd){
	return 0;
	}
	return $ad < $bd ? -1 : 1;
	//return $a['timeofmsg'] <=> $b['timeofmsg'];
	});
	$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

	echo $myjson;
	  
	  }
	  
  }
  
  
    if(isset($_POST['insertchat'])){
	$read = encrypt("1");
	$unread = encrypt("0");
	$sender = encrypt($_POST['sender']);
	$receipient = encrypt($_POST['receipient']);
	$msg = encrypt(trim($_POST['message']));
	$query = mysqli_query($dbcon,"INSERT INTO `messages`(`sender`, `receipient`, `message`, `rec_status`, `send_status`) VALUES ('".$sender."','".$receipient."','".$msg."','".$unread."','".$read."')");
	if($query){
	echo json_encode("message sent successfully");	
	}else{
	echo json_encode("error sending message");	
	}
  }
  
  if(isset($_POST['getchats'])){
	  $sender = encrypt($_POST['sender']);
	  $receipient = encrypt($_POST['receipient']);
	  $query = mysqli_query($dbcon,"SELECT * FROM `messages` WHERE (`sender` = '".$sender."' and receipient = '".$receipient."') or (`sender` = '".$receipient."' and receipient = '".$sender."') ");
	  if(mysqli_num_rows($query)<1){
		  echo json_encode("no records found");
	  }else{
		 $arr = array();	
	  while($fetch = mysqli_fetch_assoc($query)){
		$sen = decrypt($fetch['sender']);	
		$rec = decrypt($fetch['receipient']);
		$msg = decrypt($fetch['message']);
		$time = $fetch['timeofmsg'];
		$currentdate = strtotime(date("Y-m-d"));
		$date = date('Y-m-d', strtotime($time));
		$diff = $date - $currentdate;
		$cdate = '';
		$ctime = date('h:i A', strtotime($time));
		$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($date)));
		$difference = floor($diff/(60*60*24));
		if($date == date('Y-m-d')){
		$cdate = "Today, ".$ctime;	
		}else if($date == $yesterday){
		$cdate = "Yesterday @ ".$ctime;	
		}else {
		$cdate = date('l, jS F, Y', strtotime($date))." @ ".$ctime;	
		}

		$messtype = decrypt($fetch['messagetype']);
		$fsize = "";
		if($messtype == "picture"){
		$file = $imgdir.$msg;
		$filesize = filesize($file);
		$fsize = formatbytes($filesize);
		}else if($messtype == "audio"){
		$file = $audiodir.$msg;
		$filesize = filesize($file);
		$fsize = formatbytes($filesize);
		}else if($messtype == "video"){
		$file = $viddir.$msg;
		$filesize = filesize($file);
		$fsize = formatbytes($filesize);
		}else if($messtype == "document"){
		$file = $docdir.$msg;
		$filesize = filesize($file);
		$fsize = formatbytes($filesize);
		}else{
		$fsize = "";
		}
		if(decrypt($fetch['submessage'])==""){
			$fmsg="";
		}else{
			$fmsg = decrypt($fetch['submessage']);
		}

		$arr[] = array("message"=>$msg, "mtime"=>$time,"sender"=>$sen,"messagetype"=>decrypt($fetch['messagetype']),"submessage"=>$fmsg,"fsize"=>$fsize);
		array_push($arr);
	  }
	  $myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

	echo $myjson;
	  }
	  
  }
 
  
  ?>
  
  