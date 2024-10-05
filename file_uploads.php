<?php
error_reporting(0);
ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
  
  $dir = "docs/";
  
  if(isset($_POST['request'])){
	  	$docfile = base64_decode($_POST['mfile']);
	$docname = $_POST['mname'];
	$processed = encrypt("Processed");
	$unread = encrypt("0");
	$sender = encrypt($_POST['sid']);
	$msg = encrypt("Your transcript is ready");
	$mcom = encrypt("");
	
	if(file_put_contents($dir.$_POST['mname'],$docfile)){
		$query = mysqli_query($dbcon,"UPDATE `transcript_requests` SET `status`='".$processed."',`tfile`='".encrypt($docname)."' WHERE `student_id` = '".$sender."'");
		$squery = mysqli_query($dbcon,"INSERT INTO `messages`(`sender`, `receipient`, `message`, `messagetype`, `submessage`, `rec_status`, `send_status`) VALUES ('".encrypt($_POST['uid'])."','".$sender."','".$msg."', '".encrypt("text")."', '".$mcom."','".$unread."','".$read."')");
	if($query){
	echo json_encode("file saved successfully");	
	}else{
	echo json_encode("error saving file");	
	}
		
		}else{
		echo json_encode("error uploading file; ");
	}
	  
  }
  
  ?>