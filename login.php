<?php
error_reporting(0);
 ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
  
  $user =  encrypt($_POST['user']);
$password =  encrypt($_POST['password']);
 $activestatus = encrypt("1");
$lecturerpassword = encrypt("lec2022");
$adminpassword = encrypt("adm2022");
$studentpassword = encrypt("std2022");
$checksql = mysqli_query($dbcon, " SELECT `role` FROM `admin` WHERE `user_id` = '".$user."' and `password` = '".$password."' union SELECT `role` FROM `lecturer_tab` WHERE `lec_id` = '".$user."' and `lec_password` = '".$password."' and `status` = '".$activestatus."' UNION SELECT `grole` FROM `students` WHERE `student_id` = '".$user."' and `password` = '".$password."' and `status` = '".$activestatus."' UNION SELECT `role` FROM `work_admins` WHERE `admin_id` = '".$user."' and `password` = '".$password."' and `status` = '".$activestatus."'");


if(mysqli_num_rows($checksql)<1){
echo json_encode("error finding user's credentials");	
}else{
$fetchc=mysqli_fetch_assoc($checksql);
if(decrypt($fetchc['role'])=="Admin"){
echo json_encode("default admin");	
}else{
$sql = mysqli_query($dbcon,"SELECT s.`firstname`,s.`lastname`,s.`title`,s.`student_id` as uid,s.`grole` as role, s.`image` , s.password, s.userpin as pin FROM `students` s  WHERE s.`student_id` = '".$user."' and s.`password` = '".$password."' and s.`status` = '".$activestatus."' UNION SELECT l.`lec_fname`,l.`lec_lname`,l.`lec_title`,l.`lec_id` as uid,l.`role`, l.`lec_img` as image , l.lec_password, l.userpin as pin from lecturer_tab l where l.lec_id = '".$user."' and l.lec_password = '".$password."' and l.`status` = '".$activestatus."' UNION SELECT wa.`firstname`,wa.`lastname`,wa.`title`,wa.`admin_id` as uid,wa.`role`, wa.`image` , wa.password, wa.userpin as pin from work_admins wa  where wa.admin_id = '".$user."' and wa.password = '".$password."' and wa.`status` = '".$activestatus."'");


$arr = array();
	while($fetch=mysqli_fetch_assoc($sql)){
	if(($fetch['password'] == $lecturerpassword) || ($fetch['password'] == $adminpassword) || ($fetch['password'] == $studentpassword)){
		//echo json_encode("reset password");
		$arr[] = array("response"=>"reset password");
		array_push($arr);
	}else{
		$img = decrypt($fetch['image']);
		if(decrypt($fetch['role'])=="Administrator"){
		$arr[] = array("userid"=>decrypt($fetch['uid']), "user"=>decrypt($fetch['title'])." ".decrypt($fetch['firstname'])." ".decrypt($fetch['lastname']), "img"=>$img, "grole"=>decrypt($fetch['role']),"pin"=>decrypt($fetch['pin']),"operation"=>"successful");
		
		array_push($arr);
		
		}
		if(decrypt($fetch['role'])=="Lecturer"){
		$arr[] = array("userid"=>decrypt($fetch['uid']), "user"=>decrypt($fetch['title'])." ".decrypt($fetch['firstname'])." ".decrypt($fetch['lastname']), "img"=>$img,  "grole"=>decrypt($fetch['role']), "roles"=>"","pin"=>decrypt($fetch['pin']),"operation"=>"successful");
		
		array_push($arr);
		
		}
		if(decrypt($fetch['role'])=="Student"){
			
				
			
		$arr[] = array("userid"=>decrypt($fetch['uid']), "user"=>decrypt($fetch['title'])." ".decrypt($fetch['firstname'])." ".decrypt($fetch['lastname']), "img"=>$img, "grole"=>decrypt($fetch['role']), "roles"=>"","pin"=>decrypt($fetch['pin']),"operation"=>"successful");	
		
		array_push($arr);
		
		}
		
		
	}		
	}
	 $myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;

}


}
  
  ?>