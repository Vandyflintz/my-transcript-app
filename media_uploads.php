<?php
error_reporting(0);
ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
 
  
  $imgdir = "chat_media/pics/";
  $audiodir = "chat_media/audio/";
  $docdir = "chat_media/documents/";	
  $viddir = "chat_media/video/";
  
  //INSERT INTO `messages`(`sender`, `receipient`, `message`, `messagetype`, `rec_status`, `send_status`) VALUES ('".."','".."','".."','".."','".."','".."')
  
  if(isset($_POST["messagetype"])){
  $mtype = $_POST['messagetype'];

if($mtype =="picture"){
	$imageQuality = 60;
	$imgfile = base64_decode($_POST['mfile']);
	$imgname = $_POST['mname'];
	$read = encrypt("1");
	$unread = encrypt("0");
	$sender = encrypt($_POST['sender']);
	$receipient = encrypt($_POST['receipient']);
	$msg = encrypt($_POST['mname']);
	$mcom = encrypt($_POST['desc']);
	if(file_put_contents($imgdir.$_POST['mname'],$imgfile)){
		
		$sourceimage = $imgdir.$imgfile;
		$image_destination = $imgdir.$imgfile;
		$compressedimages = compressimage($sourceimage,$image_destination);
		$query = mysqli_query($dbcon,"INSERT INTO `messages`(`sender`, `receipient`, `message`, `messagetype`, `submessage`, `rec_status`, `send_status`) VALUES ('".$sender."','".$receipient."','".$msg."', '".encrypt($mtype)."', '".$mcom."','".$unread."','".$read."')");
	if($query){
	echo json_encode("message sent successfully");	
	}else{
	echo json_encode("error sending message");	
	}
		}else{
		echo json_encode("error uploading file; ");
	}
}

if($mtype =="audio"){
	$audiofile = base64_decode($_POST['mfile']);
	$audioname = $_POST['mname'];
	$read = encrypt("1");
	$unread = encrypt("0");
	$sender = encrypt($_POST['sender']);
	$receipient = encrypt($_POST['receipient']);
	$msg = encrypt($_POST['mname']);
	$mcom = encrypt($_POST['desc']);
		if(file_put_contents($audiodir.$_POST['mname'],$audiofile)){
		$query = mysqli_query($dbcon,"INSERT INTO `messages`(`sender`, `receipient`, `message`, `messagetype`, `submessage`, `rec_status`, `send_status`) VALUES ('".$sender."','".$receipient."','".$msg."', '".encrypt($mtype)."', '".$mcom."','".$unread."','".$read."')");
	if($query){
	echo json_encode("message sent successfully");	
	}else{
	echo json_encode("error sending message");	
	}
		
		}else{
		echo json_encode("error uploading file; ");
	}	
}

if($mtype =="video"){
	
	$vidfile = base64_decode($_POST['mfile']);
	
	$vidname = $_POST['mname'];
	$read = encrypt("1");
	$unread = encrypt("0");
	$sender = encrypt($_POST['sender']);
	$receipient = encrypt($_POST['receipient']);
	$msg = encrypt($_POST['mname']);
	$mcom = encrypt($_POST['desc']);
	
	if(file_put_contents($viddir.$_POST['mname'],$vidfile)){
		$query = mysqli_query($dbcon,"INSERT INTO `messages`(`sender`, `receipient`, `message`, `messagetype`, `submessage`, `rec_status`, `send_status`) VALUES ('".$sender."','".$receipient."','".$msg."', '".encrypt($mtype)."', '".$mcom."','".$unread."','".$read."')");
	if($query){
	echo json_encode("message sent successfully");	
	}else{
	echo json_encode("error sending message");	
	}
		
		}else{
		echo json_encode("error uploading file; ");
	}
}

if($mtype =="document"){
	$docfile = base64_decode($_POST['mfile']);
	$docname = $_POST['mname'];
	$read = encrypt("1");
	$unread = encrypt("0");
	$sender = encrypt($_POST['sender']);
	$receipient = encrypt($_POST['receipient']);
	$msg = encrypt($_POST['mname']);
	$mcom = encrypt($_POST['desc']);
	if(file_put_contents($docdir.$_POST['mname'],$docfile)){
		$query = mysqli_query($dbcon,"INSERT INTO `messages`(`sender`, `receipient`, `message`, `messagetype`, `submessage`, `rec_status`, `send_status`) VALUES ('".$sender."','".$receipient."','".$msg."', '".encrypt($mtype)."', '".$mcom."','".$unread."','".$read."')");
	if($query){
	echo json_encode("message sent successfully");	
	}else{
	echo json_encode("error sending message");	
	}
		
		}else{
		echo json_encode("error uploading file; ");
	}
}
  }
  
  function compressimage($source_image, $compress_image){
	$image_info = getimagesize($source_image);
	if($image_info['mime']== 'image/jpeg'){
		$source_image = imagecreatefromjpeg($source_image);
		imagejpeg($source_image, $compress_image, 75);
	}else if($image_info['mime']== 'image/png'){
		$source_image = imagecreatefrompng($source_image);
		imagepng($source_image, $compress_image, 75);
	} else if($image_info['mime']== 'image/gif'){
		$source_image = imagecreatefromgif($source_image);
		imagegif($source_image, $compress_image, 75);
	}else if($image_info['mime']== 'image/bmp'){
		$source_image = imagecreatefromwbmp($source_image);
		imagewbmp($source_image, $compress_image, 75);
	}
	
	return $compress_image;
	
}
?>