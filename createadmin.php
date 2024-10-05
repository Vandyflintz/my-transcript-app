<?php

 error_reporting(0);
 ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
  
  
  if(isset($_POST['uid'])){
	$id =   encrypt($_POST['uid']);
	$password = encrypt($_POST['pw']);  
	$urole = "Admin";
	$role = encrypt($urole);
	 
	$insert = mysqli_query($dbcon,"INSERT INTO `admin`(`user_id`, `password`, `role`) VALUES ('".$id."','".$password."','".$role."')");  
	
	if($insert){
		$myfile = fopen("userdata/nameIdsPasswords.txt", "a") or die("unable to open file");
$txt = "userid => ". $_POST['uid']." , password => ".$_POST['pw'];
fwrite($myfile,PHP_EOL."\n". $txt);
fclose($myfile);

	echo json_encode("successfully added user");
	}else{
		echo json_encode("error adding user as admin");
	}
	
  }
  
  //
  
  

?>