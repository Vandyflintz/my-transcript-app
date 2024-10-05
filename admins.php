<?php
 error_reporting(0);
  ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
  
  $activestatus = encrypt("1");
  $inactivestatus = encrypt("0");
  
  if(isset($_POST['getcurrent'])){
  $getcurrentadmins = mysqli_query($dbcon,"SELECT * FROM `work_admins` WHERE `status` = '".$activestatus."'");
  
  if(mysqli_num_rows($getcurrentadmins)<1){
	  echo json_encode("No data available for display");
  }else{
	  $arr = array();	
	  while($fetch=mysqli_fetch_assoc($getcurrentadmins)){
		$fname = decrypt($fetch['firstname']);
		$lname = decrypt($fetch['lastname']);
		$title = decrypt($fetch['title']);
		$lname = decrypt($fetch['lastname']);
		$email = decrypt($fetch['email_address']);
		$contact = decrypt($fetch['contact']);
		$adminid = decrypt($fetch['admin_id']);
		$fullname = $title." ".$fname." ".$lname;
		$img = decrypt($fetch['image']);
		
		$arr[] = array("name"=>$fullname,"id"=>$adminid,"email"=>$email,"contact"=>$contact,"dp"=> $img,"firstname"=>$fname,"lastname"=>$lname);
		array_push($arr);
	  }
	  $myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;  
  }
  }
  
  
  if(isset($_POST['getinactive'])){
  $getpastadmins = mysqli_query($dbcon,"SELECT * FROM `work_admins` WHERE `status` = '".$inactivestatus."'");
  
  if(mysqli_num_rows($getpastadmins)<1){
	  echo json_encode("No data available for display");
  }else{
	  $arr = array();	
	  while($fetch=mysqli_fetch_assoc($getpastadmins)){
		$fname = decrypt($fetch['firstname']);
		$lname = decrypt($fetch['lastname']);
		$title = decrypt($fetch['title']);
		$lname = decrypt($fetch['lastname']);
		$email = decrypt($fetch['email_address']);
		$contact = decrypt($fetch['contact']);
		$adminid = decrypt($fetch['admin_id']);
		$fullname = $title." ".$fname." ".$lname;
		$img = decrypt($fetch['image']);

		$arr[] = array("name"=>$fullname,"id"=>$adminid,"email"=>$email,"contact"=>$contact,"dp"=> $img,"firstname"=>$fname,"lastname"=>$lname);
		array_push($arr);
	  }
	  
	$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;  
  }
  }
  
  if(isset($_POST['restoreuser'])){
	$activestatus = encrypt("1");
	$id = encrypt($_POST['id']); 
	
	$resuser = mysqli_query($dbcon,"UPDATE `work_admins` SET `status`='".$activestatus."' WHERE `admin_id` = '".$id."'");	
	if($resuser){
		echo json_encode("operation was successful!");
	}else{
		echo json_encode("operation failed");
	}
  }
  
  if(isset($_POST['deluser'])){
	  $inactivestatus = encrypt("0");
	$id = encrypt($_POST['id']);
	
	if($_POST['status']=="temporary"){
	$deluser = mysqli_query($dbcon,"UPDATE `work_admins` SET `status`='".$inactivestatus."' WHERE `admin_id` = '".$id."'");		
	}else{
	$deluser = mysqli_query($dbcon,"DELETE FROM `work_admins` WHERE `admin_id` = '".$id."'");	
	}
	if($deluser){
		echo json_encode("operation was successful!");
	}else{
		echo json_encode("operation failed");
	}
  }
  
  ?>