<?php
error_reporting(0);
 ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
  
if(isset($_POST['updatepassword'])){
	$user =  encrypt($_POST['user']);
$password =  encrypt($_POST['password']);
$pin = encrypt($_POST['pin']);
$secqn = encrypt($_POST['secqn']);
$secans = encrypt(strtolower($_POST['secans']));
$date = encrypt(date('Y-m-d H:i:s'));

$resetqn= mysqli_query($dbcon,"INSERT INTO `password_reset`( `userid`, `security_question`, `answer`, `last_updated_on`) VALUES ('".$user."','".$secqn."','".$secans."','".$date."')");


$searchfirst = mysqli_query($dbcon,"SELECT * FROM `students` WHERE `student_id` = '".$user."'");
if(mysqli_num_rows($searchfirst)<1){
	$searchsecond= mysqli_query($dbcon,"SELECT * FROM `lecturer_tab` WHERE `lec_id` = '".$user."'"); 
	
	if(mysqli_num_rows($searchsecond)<1){
	$sql = mysqli_query($dbcon,"UPDATE `work_admins` SET `password`= '".$password."',`userpin`='".$pin."' WHERE `admin_id` = '".$user."'");

if($sql){
	echo json_encode("operation was successful");
}else{
	echo json_encode("error updating password");
}	
		
	}else{
	$sql = mysqli_query($dbcon,"UPDATE `lecturer_tab` SET `lec_password`= '".$password."',`userpin`='".$pin."' WHERE `lec_id` = '".$user."'");

if($sql){
	echo json_encode("operation was successful");
}else{
	echo json_encode("error updating password ".mysqli_error($dbcon));
}	
		
	}	
	
	
}else{
$sql = mysqli_query($dbcon,"UPDATE `students` SET `password`= '".$password."',`userpin`='".$pin."' WHERE `student_id` = '".$user."'");

if($sql){
	echo json_encode("operation was successful");
}else{
	echo json_encode("error updating password");
}	
}


}


if(isset($_POST['resetpassword'])){
$user =  encrypt($_POST['user']);
$password =  encrypt($_POST['password']);
$secqn = encrypt($_POST['secqn']);
$secans = encrypt(strtolower($_POST['secans']));
$date = encrypt(date('Y-m-d H:i:s'));
	$checksql = mysqli_query($dbcon,"SELECT * FROM `password_reset` WHERE `userid` = '".$user."' and `security_question` = '".$secqn."' and `answer` = '".$secans."'");
	
if(mysqli_num_rows($checksql)<1){
	echo json_encode("user not found");
}else{
$updatepasswordresettab = mysqli_query($dbcon,"UPDATE `password_reset` SET `last_updated_on`= '".$date."' WHERE `userid` = '".$user."'");	
	
$searchfirst = mysqli_query($dbcon,"SELECT * FROM `students` WHERE `student_id` = '".$user."'");
if(mysqli_num_rows($searchfirst)<1){
	$searchsecond= mysqli_query($dbcon,"SELECT * FROM `lecturer_tab` WHERE `lec_id` = '".$user."'"); 
	
	if(mysqli_num_rows($searchsecond)<1){
	$sql = mysqli_query($dbcon,"UPDATE `work_admins` SET `password`= '".$password."' WHERE `admin_id` = '".$user."'");

if($sql){
	echo json_encode("operation was successful");
}else{
	echo json_encode("error updating password");
}	
		
	}else{
	$sql = mysqli_query($dbcon,"UPDATE `lecturer_tab` SET `password`= '".$password."' WHERE `lec_id` = '".$user."'");

if($sql){
	echo json_encode("operation was successful");
}else{
	echo json_encode("error updating password");
}	
		
	}	
	
	
}else{
$sql = mysqli_query($dbcon,"UPDATE `students` SET `password`= '".$password."' WHERE `student_id` = '".$user."'");

if($sql){
	echo json_encode("operation was successful");
}else{
	echo json_encode("error updating password");
}	
}	
}	
}

if(isset($_POST['resetpin'])){
$user =  encrypt($_POST['user']);
$pin =  encrypt($_POST['pin']);
$secqn = encrypt($_POST['secqn']);
$secans = encrypt($_POST['secans']);
$date = encrypt(date('Y-m-d H:i:s'));
	$checksql = mysqli_query($dbcon,"SELECT * FROM `password_reset` WHERE `userid` = '".$user."' and `security_question` = '".$secqn."' and `answer` = '".$secans."'");
	
if(mysqli_num_rows($checksql)<1){
	echo json_encode("user not found");
}else{	
	
$searchfirst = mysqli_query($dbcon,"SELECT * FROM `students` WHERE `student_id` = '".$user."'");
if(mysqli_num_rows($searchfirst)<1){
	$searchsecond= mysqli_query($dbcon,"SELECT * FROM `lecturer_tab` WHERE `lec_id` = '".$user."'"); 
	
	if(mysqli_num_rows($searchsecond)<1){
	$sql = mysqli_query($dbcon,"UPDATE `work_admins` SET `userpin`= '".$pin."' WHERE `admin_id` = '".$user."'");

if($sql){
	echo json_encode("operation was successful");
}else{
	echo json_encode("error updating password");
}	
		
	}else{
	$sql = mysqli_query($dbcon,"UPDATE `lecturer_tab` SET `userpin`= '".$pin."' WHERE `lec_id` = '".$user."'");

if($sql){
	echo json_encode("operation was successful");
}else{
	echo json_encode("error updating password");
}	
		
	}	
	
	
}else{
$sql = mysqli_query($dbcon,"UPDATE `students` SET `userpin`= '".$pin."' WHERE `student_id` = '".$user."'");

if($sql){
	echo json_encode("operation was successful");
}else{
	echo json_encode("error updating password");
}	
}	
}	
}
?>