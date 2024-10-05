<?php
 error_reporting(0);
  ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
  
  if(isset($_POST['request'])){
$request = $_POST['request'];	  
	  if($request=="getfee"){
		$servicetype = encrypt("Transcript");
		$query = mysqli_query($dbcon, "SELECT * FROM `services` WHERE `service` = '".$servicetype."'");
		$arr = array();

		while($fetch = mysqli_fetch_assoc($query)){
			$arr[] = array("service"=>decrypt($fetch['service']), "cost"=>decrypt($fetch['cost']));
		array_push($arr);
			
		}
		
		$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
			
		  
	  }
	  
	  
	  if($request=="balance"){
		  $sql = mysqli_query($dbcon, "SELECT * FROM `student_finance` WHERE `student_id` = '".encrypt($_POST['id'])."'");
		  		$arr = array();

		while($fetch = mysqli_fetch_assoc($sql)){
			$arr[] = array("bal"=>decrypt($fetch['amt_remaining']));
		array_push($arr);
			
		}
		
		$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
	  }
	  
  
	if($request=="transcript"){
	 $sql = mysqli_query($dbcon, "SELECT * FROM `transcript_requests` WHERE `student_id` = '".encrypt($_POST['id'])."' order by id desc");
	 
	 if(mysqli_num_rows($sql)<1){
		 echo json_encode("No records available");
	 }else{
		  		$arr = array();

		while($fetch = mysqli_fetch_assoc($sql)){
			if(decrypt($fetch['tfile'])==""){
			$file="";	
			}else{
			$file = decrypt($fetch['tfile']);	
			}
			$arr[] = array("date"=>date('l, jS F, Y',(strtotime(decrypt($fetch['date_applied'])))), "status"=>decrypt($fetch['status']), "file"=>$file);
		array_push($arr);
			
		}
		
		$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;	
	 }
	}
  
  
  if($request=="apply"){
	  $date = date('Y-m-d');
	  $query = mysqli_query($dbcon,"INSERT INTO `transcript_requests`(`student_id`, `date_applied`,  `status`) VALUES ('".encrypt($_POST['id'])."','".encrypt($date)."','".encrypt("Pending")."')");

	 $getstudent = mysqli_query($dbcon, "SELECT * FROM `student_finance` WHERE `student_id` = '".encrypt($_POST['id'])."'"); 
	 while($sfetch = mysqli_fetch_assoc($getstudent)){
			$nbal = decrypt($sfetch['amt_remaining']);
			$famt = $nbal - str_replace(',','',$_POST['bal']);
			$sql = mysqli_query($dbcon, "UPDATE `student_finance` SET `amt_remaining`='".encrypt($famt)."' WHERE `student_id` = '".encrypt($_POST['id'])."'");
	 }	

  if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error ".mysqli_error($dbcon));  
  } 
	  
  }
  
  
  }
  
  
  ?>