<?php
error_reporting(0);
ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
 
if(isset($_POST['request'])){ 
  
  
$dir = "imgdata/";
$imageQuality = 60;
$dpfile = base64_decode($_POST['profimg']);
$activestatus = encrypt("1");
$dp = encrypt($_POST['profilename']);


if($_POST['request']=="lecturer"){



$firstname = encrypt($_POST['firstname']);
$lastname = encrypt($_POST['lastname']);
$title = encrypt($_POST['title']);
$date_of_birth = encrypt($_POST['dob']);
$contact = encrypt($_POST['contact']);
$staff_id = encrypt($_POST['staffid']);
$password = encrypt($_POST['password']);
$email_address = encrypt($_POST['email_address']);
$dept = encrypt($_POST['department']);
$date = encrypt(date('Y-m-d H:i:s'));




if(file_put_contents($dir.$_POST['profilename'],$dpfile)){
		
		$sourceimage = $dir.$dpfile;
		$image_destination = $dir.$dpfile;
		$compressedimages = compressimage($sourceimage,$image_destination);

		
		$sql=mysqli_query($dbcon,"INSERT INTO `lecturer_tab`(`lec_fname`, `lec_lname`, `lec_title`, `dob`, `lec_id`, `lec_depid`, `lec_img`, `lec_email_address`, `lec_phonenum`, `lec_password`, `status`) VALUES ('".$firstname."','".$lastname."','".$title."','".$date_of_birth."','".$staff_id."','".$dept."','".$dp."','".$email_address."','".$contact."','".$password."','".$activestatus."')");
		if($sql){
		echo "worker added successfully";
		}else{
			echo "error adding worker ".mysqli_error($dbcon);
		}
}else{
		echo json_encode("error uploading profile picture; ");
	}

}

if($_POST['request']=="student"){



$firstname = encrypt($_POST['firstname']);
$lastname = encrypt($_POST['lastname']);
$title = encrypt($_POST['title']);
$date_of_birth = encrypt($_POST['dob']);
$contact = encrypt($_POST['contact']);
$sid = encrypt($_POST['staffid']);
$password = encrypt($_POST['password']);
$email_address = encrypt($_POST['email_address']);
$admdate = encrypt($_POST['admissiondate']);
$guardiandetails = encrypt($_POST['guardian_details']);
$gender = encrypt($_POST['gender']);
$admbasis = encrypt($_POST['admissionbasis']);
$progtype = encrypt($_POST['programmetype']);
$majprog = encrypt($_POST['majorprogramme']);
$minprog = encrypt($_POST['minorprogramme']);
$dept = encrypt($_POST['dept']);
$date = encrypt(date('Y-m-d H:i:s'));




if(file_put_contents($dir.$_POST['profilename'],$dpfile)){
		
		$sourceimage = $dir.$dpfile;
		$image_destination = $dir.$dpfile;
		$compressedimages = compressimage($sourceimage,$image_destination);

		
		$sql=mysqli_query($dbcon,"INSERT INTO `students`(`firstname`, `lastname`, `title`, `dob`, `date_of_admission`, `name_and_address_of_parent_or_guardian`, `gender`, `image`, `basis_of_admission`, `programme_type`, `major_prog`, `minor_prog`, `student_id`, `password`, `status`, `department`) VALUES ('".$firstname."','".$lastname."','".$title."','".$dob."','".$admdate."','".$guardiandetails."','".$gender."','".$dp."','".$admbasis."','".$progtype."','".$majprog."','".$minprog."','".$sid."','".$password."','".$activestatus."','".$dept."')");
		if($sql){
		echo "student added successfully";
		}else{
			echo "error adding student ".mysqli_error($dbcon);
		}
}else{
		echo json_encode("error uploading profile picture; ");
	}

}


}
//$uploaded_files = $dir.$files;


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