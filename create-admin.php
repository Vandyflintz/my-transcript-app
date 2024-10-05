<?php
 error_reporting(0);
  ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
  
  if(isset($_POST['operation'])){
	$id = encrypt($_POST['uid']);
	$pw = encrypt($_POST['pw']);
	$title = encrypt($_POST['title']);
	$fname = encrypt($_POST['firstname']);
	$lname = encrypt($_POST['lastname']);
	$email = encrypt($_POST['email']);
	$contact = encrypt($_POST['contact']);
	$imgname = encrypt($_POST['imgname']);
	$nameofimage = $_POST['imgname'];
	$activestatus = encrypt("1");
	$inactivestatus = encrypt("0");
	$pin = encrypt($_POST['pin']);
	$secqn = encrypt($_POST['secqn']);
	$secans = encrypt(strtolower($_POST['secans']));
	$role = encrypt("Administrator");
	$dir = "imgdata/";
	$imageQuality = 60;
	$files = base64_decode($_POST['img']);
	
	
	$date = encrypt(date('Y-m-d H:i:s'));
	if(file_put_contents($dir.$nameofimage,$files)){
		
		$sourceimage = $dir.$files;
		$image_destination = $dir.$files;
		$compressedimages = compressimage($sourceimage,$image_destination);

		$insert = mysqli_query($dbcon,"INSERT INTO `work_admins`(`firstname`, `lastname`, `title`, `admin_id`, `password`, `image`, `role`, `email_address`, `contact`, `status`,`userpin`) VALUES ('".$fname."','".$lname."','".$title."','".$id."','".$pw."','".$imgname."','".$role."','".$email."','".$contact."','".$activestatus."','".$pin."')");
		
		$resetqn= mysqli_query($dbcon,"INSERT INTO `password_reset`( `userid`, `security_question`, `answer`, `last_updated_on`) VALUES ('".$id."','".$secqn."','".$secans."','".$date."')");	
		
		echo json_encode("user added successfully; ");
		
	
	
	}else{
		echo json_encode("error uploading files; ");
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