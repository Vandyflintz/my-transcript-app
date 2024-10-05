<?php
 error_reporting(0);
  ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
  
  
  
  
  if(isset($_POST['request'])){
	  $dir = "docs/";
  
  //
  
  $finalstatus = encrypt("Processed");
  $initialstatus = encrypt("Pending");
	  $data = $_POST['request'];
	  $sid = encrypt($_POST['sid']);
	  $main = encrypt($_POST['uid']);
	  $read = encrypt("1");
	$unread = encrypt("0");
	 if($data=="upload"){
		$docfile = base64_decode($_POST['mfile']);
	    $docname = $_POST['mname']; 
		$msg = "Your transcript is ready.";
		if(file_put_contents($dir.$_POST['mname'],$docfile)){
		$query = mysqli_query($dbcon,"UPDATE `transcript_requests` SET  `tfile`= '".encrypt($_POST['mname'])."', `status`= '".$finalstatus."' WHERE `student_id` = '".$sid."'");
	if($query){
	$query = mysqli_query($dbcon,"INSERT INTO `messages`(`sender`, `receipient`, `message`, `rec_status`, `send_status`) VALUES ('".$main."','".encrypt($_POST['sid'])."','".$msg."','".$unread."','".$read."')");	
	echo json_encode("processed successfully");	
	}else{
	echo json_encode("error processing request");	
	}
		
		}else{
		echo json_encode("error uploading file; ");
	}
	
		
	 } 
	  
	  if($data=="studentinsertrequest"){
		 $checksql = mysqli_query($dbcon, "SELECT * FROM `transcript_requests` WHERE `student_id` = '".$sid."'");
		if(mysqli_num_rows($checksql) < 1){
		$insertsql= mysqli_query($dbcon, "INSERT INTO `transcript_requests`( `student_id`, `date_applied`, `status`) VALUES ('".$sid."','".encrypt(date('Y-m-d'))."','".$initialstatus."')");
		 if($insertsql){
		echo json_encode("successful");  
		  }else{
			echo json_encode("error");  
		  }	
		}else{
		echo json_encode("request has already been made");	
		}	
		  
	  }
	  
	 if($data=="studentfetchrequest"){
		 $sql = mysqli_query($dbcon, "SELECT * FROM `transcript_requests` WHERE `student_id` = '".$sid."' order by id desc limit 1");
		 
		 if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	
	while($fetch = mysqli_fetch_assoc($sql)){
		$status = decrypt($fetch['status']);
		$ddate = date('l, jS F, Y', (strtotime( decrypt($fetch['date_applied']))));
		if($fetch['tfile']==""){
		$file="";	
		}else{
		$file = decrypt($fetch['tfile']);
		}
		$id = decrypt($fetch['student_id']);
		$arr[] = array("sid"=>$id, "date"=>$ddate, "status"=>$status, "tfile"=>$file);
		array_push($arr);
}


$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		 
	 } 

		 if($data=="adminfetchrequest"){
		 $sql = mysqli_query($dbcon, "SELECT *, transcript_requests.status as tstatus FROM `transcript_requests`  left join students on students.student_id = transcript_requests.student_id WHERE transcript_requests.`status` != '".encrypt("Processed")."'");
		 
		 if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	
	while($fetch = mysqli_fetch_assoc($sql)){
		$status = decrypt($fetch['tstatus']);
		$ddate = date('l, jS F, Y', (strtotime( decrypt($fetch['date_applied']))));
		if($fetch['tfile']==""){
			$file ="";
		}else{
		$file = decrypt($fetch['tfile']);
		}
		$id = decrypt($fetch['student_id']);
		if($fetch['department']==""){
		$dept = "";	
		}else{
		$dept = decrypt($fetch['department']);
		}
		$name = decrypt($fetch['title']). " ".decrypt($fetch['firstname'])." ".decrypt($fetch['lastname']);
		$arr[] = array("sid"=>$id, "date"=>$ddate, "name"=>$name, "tfile"=>$file, "dept"=>$dept);
		array_push($arr);
}


$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		 
	 } 


 }	  
  ?>