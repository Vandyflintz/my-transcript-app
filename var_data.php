<?php
 error_reporting(0);
  ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
  
  if(isset($_POST['currAcaYr'])){
	  $data = $_POST['request'];
	  if($data=="get"){
	$sql = mysqli_query($dbcon, "SELECT * FROM `current_academic_year`");
		if(mysqli_num_rows($sql) < 1){
			echo json_encode("No records available");
			
		}else{
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		$curryear = decrypt($fetch['academic_year']);
		$arr[] = array("ay"=>$curryear);
		array_push($arr);
}


$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;		
		}
	  }
	   if($data=="set"){
		  $sql = mysqli_query($dbcon, "SELECT * FROM `current_academic_year`");
		if(mysqli_num_rows($sql) < 1){
			$insertsql = mysqli_query($dbcon,"INSERT INTO  `current_academic_year`(`academic_year`) VALUES ('".encrypt($_POST['sdata'])."')");
			if($insertsql){
	echo json_encode("successful");  
  }else{
	echo json_encode("error ".mysqli_error($dbcon));  
  }
		}else{
				$insertsql = mysqli_query($dbcon,"UPDATE `current_academic_year` SET `academic_year`= '".encrypt($_POST['sdata'])."' WHERE 1");
			if($insertsql){
	echo json_encode("successful");  
  }else{
	echo json_encode("error ".mysqli_error($dbcon));  
  }
	  }
	   }
	  
  }
  
  
  
  if(isset($_POST['datatype'])){
	  $data = $_POST['datatype'];
	  $operation = $_POST['opr'];
	  $rawsdata = $_POST['sdata'];
	  $sdata = encrypt($_POST['sdata']);
	  if($data=="department"){
		  if($operation=="fetch"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `departments_tab` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	$arr[] = array("depid"=>"", "depname"=>"");
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		$did = decrypt($fetch['department_id']);
		$dname = decrypt($fetch['department_name']);
		$arr[] = array("depid"=>$did, "depname"=>$dname);
		array_push($arr);
}
$arr[] = array("depid"=>"Add More..", "depname"=>"Add More..");
		array_push($arr);

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
		 if($operation=="fetchrec"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `departments_tab` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		$did = decrypt($fetch['department_id']);
		$dname = decrypt($fetch['department_name']);
		$arr[] = array("depid"=>$did, "depname"=>$dname);
		array_push($arr);
}
;

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }  
		  
		  
		if($operation=="delete"){ 
			$query = mysqli_query($dbcon,"DELETE FROM `departments_tab` WHERE `department_id` = '".$sdata."'");
	if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }	
		}

		if($operation=="insert"){
	$generatedid = "PUC" .substr($rawsdata,0,4).date('YmdHis');
  $gid = encrypt($generatedid);
  $query = mysqli_query($dbcon,"INSERT INTO `departments_tab`(`department_name`, `department_id`) VALUES ('".$sdata."','".$gid."')");

  if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }
			
			
		}
	

		
	  }
	 if($data=="progtype"){
		  if($operation=="fetch"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `programme_type` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	$arr[] = array("ptypeid"=>"", "ptypename"=>"");
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		$did = decrypt($fetch['programme_type_id']);
		$dname = decrypt($fetch['programme_type_name']);
		$arr[] = array("ptypeid"=>$did, "ptypename"=>$dname);
		array_push($arr);
}
$arr[] = array("ptypeid"=>"Add More..", "ptypename"=>"Add More..");
		array_push($arr);

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
		  
		    if($operation=="fetchrec"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `programme_type` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	
	while($fetch = mysqli_fetch_assoc($sql)){
		$did = decrypt($fetch['programme_type_id']);
		$dname = decrypt($fetch['programme_type_name']);
		$arr[] = array("ptypeid"=>$did, "ptypename"=>$dname);
		array_push($arr);
}


$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
		  
		  
		if($operation=="delete"){ 
			$query = mysqli_query($dbcon,"DELETE FROM `programme_type` WHERE `programme_type_id` = '".$sdata."'");
	if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }	
		}

		if($operation=="insert"){
	$generatedid = "PUCPR" .substr($rawsdata,0,4).date('YmdHis');
  $gid = encrypt($_POST['prog_code']);
  $query = mysqli_query($dbcon,"INSERT INTO `programme_type`(`programme_type_name`, `programme_type_id`) VALUES ('".$sdata."','".$gid."')");

  if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }
			
			
		}
	

		
	  }  
	
	 if($data=="admbasis"){
		  if($operation=="fetch"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `admission_basis` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	$arr[] = array("admbasisid"=>"", "admbasisname"=>"");
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		$did = decrypt($fetch['admission_basis_id']);
		$dname = decrypt($fetch['admission_basis_name']);
		$arr[] = array("admbasisid"=>$did, "admbasisname"=>$dname);
		array_push($arr);
}
$arr[] = array("admbasisid"=>"Add More..", "admbasisname"=>"Add More..");
		array_push($arr);

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
		  
		  if($operation=="fetchrec"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `admission_basis` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	while($fetch = mysqli_fetch_assoc($sql)){
		$did = decrypt($fetch['admission_basis_id']);
		$dname = decrypt($fetch['admission_basis_name']);
		$arr[] = array("admbasisid"=>$did, "admbasisname"=>$dname);
		array_push($arr);
}


$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }  
		  
		  
		if($operation=="delete"){ 
			$query = mysqli_query($dbcon,"DELETE FROM `admission_basis` WHERE `admission_basis_id` = '".$sdata."'");
	if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }	
		}

		if($operation=="insert"){
	$generatedid = "PUCPT" .substr($rawsdata,0,4).date('YmdHis');
  $gid = encrypt($generatedid);
  $query = mysqli_query($dbcon,"INSERT INTO `admission_basis`(`admission_basis_name`, `admission_basis_id`) VALUES ('".$sdata."','".$gid."')");

  if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }
			
			
		}
	

		
	  }  

	
		 if($data=="programme"){
		  if($operation=="fetch"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `programme` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	$arr[] = array("progid"=>"", "progname"=>"");
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		$did = decrypt($fetch['programme_code']);
		$dname = decrypt($fetch['programme_name']);
		$arr[] = array("progid"=>$did, "progname"=>$dname);
		array_push($arr);
}
$arr[] = array("progid"=>"Add More..", "progname"=>"Add More..");
		array_push($arr);

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
	
		if($operation=="fetchrec"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `programme` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	while($fetch = mysqli_fetch_assoc($sql)){
		$did = decrypt($fetch['programme_code']);
		$dname = decrypt($fetch['programme_name']);
		$arr[] = array("progid"=>$did, "progname"=>$dname);
		array_push($arr);
}

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
		  
		  
		if($operation=="delete"){ 
			$query = mysqli_query($dbcon,"DELETE FROM `programme` WHERE `programme_code` = '".$sdata."'");
	if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }	
		}

		if($operation=="insert"){
	$generatedid = "PUCPR" .substr($rawsdata,0,4).date('YmdHis');
  $gid = encrypt($generatedid);
  $query = mysqli_query($dbcon,"INSERT INTO `programme`(`programme_name`, `programme_code`) VALUES ('".$sdata."','".$gid."')");

  if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }
			
			
		}
	

		
	  } 
	
  
  		 if($data=="classes"){
		  if($operation=="fetch"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `class_tab` left join courses on courses.course_id = class_tab.course_id left join section_tab on section_tab.section_id = class_tab.section_id left join time_tab on time_tab.time_id = class_tab.time_id left join lecturer_tab on lecturer_tab.lec_id = class_tab.lecturer_id left join lecture_hall_tab on lecture_hall_tab.lecture_hall_id = class_tab.lecture_hall_id left join academic_year_tab on academic_year_tab.ay_id = class_tab.ay_id ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	
	while($fetch = mysqli_fetch_assoc($sql)){
		
		$arr[] = array("clid"=>decrypt($fetch['class_id']), "course"=>decrypt($fetch['course_id'])." - ".decrypt($fetch['name_of_course']), "section"=>decrypt($fetch['section_name']), "time"=>decrypt($fetch['time_interval']) , "lecturer"=>decrypt($fetch['lec_title'])." ".decrypt($fetch['lec_fname'])." ".decrypt($fetch['lec_lname']) , "lecturehall"=>decrypt($fetch['lecture_hall_name']), "day"=>decrypt($fetch['day']), "academicyear"=>decrypt($fetch['academic_year_start'])."/".decrypt($fetch['academic_year_end']), "course_id"=>decrypt($fetch['course_id']),"section_id"=>decrypt($fetch['section_id']), "time_id"=> decrypt($fetch['time_id']), "lecturer_id"=>decrypt($fetch['lec_id']), "lecturehall_id"=> decrypt($fetch['lecture_hall_id']), "ay_id"=>decrypt($fetch['ay_id']));
		array_push($arr);
}


$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
	
		if($operation=="fetchrec"){ 
		$currAy = encrypt($_POST['curray']);
$sql = mysqli_query($dbcon,"SELECT * FROM `class_tab` left join courses on courses.course_id = class_tab.course_id left join section_tab on section_tab.section_id = class_tab.section_id left join time_tab on time_tab.time_id = class_tab.time_id left join lecturer_tab on lecturer_tab.lec_id = class_tab.lecturer_id left join lecture_hall_tab on lecture_hall_tab.lecture_hall_id = class_tab.lecture_hall_id left join academic_year_tab on academic_year_tab.ay_id = class_tab.ay_id where academic_year_tab.academic_year = '".$currAy."'");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	$arr[] = array("clid"=>"", "clname"=>"", "section"=>"", "time"=>"" , "lecturer"=>"" , "lecturehall"=>"", "day"=>"", "academicyear"=>"", "course_id"=>"","section_id"=>"", "time_id"=> "", "lecturer_id"=>"", "lecturehall_id"=> "", "ay_id"=>"");
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		$arr[] = array("clid"=>decrypt($fetch['class_id']), "clname"=>decrypt($fetch['course_id'])." - ".decrypt($fetch['name_of_course']).", Section ".decrypt($fetch['section_name']), "section"=>decrypt($fetch['section_name']), "time"=>decrypt($fetch['time_interval']) , "lecturer"=>decrypt($fetch['lec_title'])." ".decrypt($fetch['lec_fname'])." ".decrypt($fetch['lec_lname']) , "lecturehall"=>decrypt($fetch['lecture_hall_name']), "day"=>decrypt($fetch['day']), "academicyear"=>decrypt($fetch['academic_year_start'])."/".decrypt($fetch['academic_year_end']), "course_id"=>decrypt($fetch['course_id']),"section_id"=>decrypt($fetch['section_id']), "time_id"=> decrypt($fetch['time_id']), "lecturer_id"=>decrypt($fetch['lec_id']), "lecturehall_id"=> decrypt($fetch['lecture_hall_id']), "ay_id"=>decrypt($fetch['ay_id']));
		array_push($arr);
}

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
		  
		  
		if($operation=="delete"){ 
			$query = mysqli_query($dbcon,"DELETE FROM `class_tab` WHERE `class_id` = '".$sdata."'");
	if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }	
		}

		if($operation=="insert"){
			
	$generatedid = "PUCCS" .substr($_POST['sche'],0,4).substr($_POST['day'],0,4).date('YmdHis');
  $gid = encrypt($generatedid);
  
  $query = mysqli_query($dbcon,"INSERT INTO `class_tab`(`course_id`, `section_id`, `time_id`, `lecturer_id`, `lecture_hall_id`, `class_id`, `day`, `ay_id`) VALUES ('".encrypt($_POST['cid'])."','".encrypt($_POST['secid'])."','".encrypt($_POST['timeid'])."','".encrypt($_POST['lecid'])."','".encrypt($_POST['lechallid'])."','".$gid."','".encrypt($_POST['day'])."','".encrypt($_POST['ayid'])."')");

  if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error ".mysqli_error($dbcon));  
  }
			
			
		}
	

		
	  } 
  
  
   if($data=="course"){
		  if($operation=="fetch"){ 
$sql = mysqli_query($dbcon,"SELECT courses.*, lecturer_tab.lec_fname, lecturer_tab.lec_lname, lecturer_tab.lec_title, lecturer_tab.lec_id FROM `courses` left join lecturer_tab on lecturer_tab.lec_id = courses.lecturer_id  ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	$arr[] = array("cid"=>"", "cname"=>"", "clec"=>"", "lec_id"=>"");
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		
		$arr[] = array("cid"=>decrypt($fetch['course_id']), "cname"=>decrypt($fetch['name_of_course']), "clec"=>decrypt($fetch['lec_title'])." ".decrypt($fetch['lec_fname'])." ".decrypt($fetch['lec_lname']), "lec_id"=>decrypt($fetch['lec_id']));
		array_push($arr);
}


$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
	
		if($operation=="fetchrec"){ 
$sql = mysqli_query($dbcon,"SELECT courses.*, lecturer_tab.lec_fname, lecturer_tab.lec_lname, lecturer_tab.lec_title, lecturer_tab.lec_id FROM `courses` left join lecturer_tab on lecturer_tab.lec_id = courses.lecturer_id  ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	while($fetch = mysqli_fetch_assoc($sql)){
		$arr[] = array("cid"=>decrypt($fetch['course_id']), "cname"=>decrypt($fetch['name_of_course']), "clec"=>decrypt($fetch['lec_title'])." ".decrypt($fetch['lec_fname'])." ".decrypt($fetch['lec_lname']), "lec_id"=>decrypt($fetch['lec_id']));
		array_push($arr);
		
}

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
		  
		  
		if($operation=="delete"){ 
			$query = mysqli_query($dbcon,"DELETE FROM `courses` WHERE `course_id`  = '".$sdata."'");
	if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }	
		}

		if($operation=="insert"){
			
	$generatedid = "PUCCS" .substr($_POST['sdata'],0,4).date('YmdHis');
  $gid = encrypt($generatedid);
  $query = mysqli_query($dbcon,"INSERT INTO `courses`(`name_of_course`, `course_id`, `credit_hours`) VALUES ('".encrypt($_POST['sdata'])."','".encrypt(strtoupper($_POST['sid']))."', '".encrypt($_POST['crdhrs'])."')");

  if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }
			
			
		}
	

		
	  } 
	
  
  		 if($data=="section"){
		  if($operation=="fetch"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `section_tab` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	$arr[] = array("secid"=>"", "secname"=>"");
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		$arr[] = array("secid"=>decrypt($fetch['section_id']), "secname"=>decrypt($fetch['section_name']));
		array_push($arr);
}

usort($arr, function($el1, $el2){
	return strcmp($el1['secname'], $el2['secname']);
});

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
	
		if($operation=="fetchrec"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `section_tab` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	while($fetch = mysqli_fetch_assoc($sql)){
			$arr[] = array("secid"=>decrypt($fetch['section_id']), "secname"=>decrypt($fetch['section_name']));
		array_push($arr);
}

usort($arr, function($el1, $el2){
	return strcmp($el1['secname'], $el2['secname']);
});

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
		  
		  
		if($operation=="delete"){ 
			$query = mysqli_query($dbcon,"DELETE FROM `section_tab` WHERE `section_id` = '".$sdata."'");
	if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }	
		}

		if($operation=="insert"){
	$generatedid = "PUCSD" .substr("section",0,4).date('YmdHis');
  $gid = encrypt($generatedid);
  $query = mysqli_query($dbcon,"INSERT INTO `section_tab`( `section_name`, `section_id`) VALUES ('".$sdata."','".$gid."')");

  if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }
			
			
		}
	

		
	  } 
	

  		 if($data=="times"){
		  if($operation=="fetch"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `time_tab` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	$arr[] = array("timeid"=>"", "timename"=>"");
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		$arr[] = array("timeid"=>decrypt($fetch['time_id']), "timename"=>decrypt($fetch['time_interval']));
		array_push($arr);
}


$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
	
		if($operation=="fetchrec"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `time_tab` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	while($fetch = mysqli_fetch_assoc($sql)){
			$arr[] = array("timeid"=>decrypt($fetch['time_id']), "timename"=>decrypt($fetch['time_interval']));
		array_push($arr);
}

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
		  
		  
		if($operation=="delete"){ 
			$query = mysqli_query($dbcon,"DELETE FROM `time_tab` WHERE `time_id` = '".$sdata."'");
	if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }	
		}

		if($operation=="insert"){
	$generatedid = "PUCTS" .substr("time",0,4).date('YmdHis');
  $gid = encrypt($generatedid);
  $query = mysqli_query($dbcon,"INSERT INTO `time_tab`( `time_interval`, `time_id`) VALUES ('".encrypt($_POST['sdata'])."','".$gid."')");

  if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }
			
			
		}
	

		
	  } 
	
  
  	 if($data=="lecturehall"){
		  if($operation=="fetch"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `lecture_hall_tab` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	$arr[] = array("hallid"=>"", "hallname"=>"");
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		$arr[] = array("hallid"=>decrypt($fetch['lecture_hall_id']), "hallname"=>decrypt($fetch['lecture_hall_name']));
		array_push($arr);
}


$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
	
		if($operation=="fetchrec"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `lecture_hall_tab` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	while($fetch = mysqli_fetch_assoc($sql)){
			$arr[] = array("hallid"=>decrypt($fetch['lecture_hall_id']), "hallname"=>decrypt($fetch['lecture_hall_name']));
		array_push($arr);
}

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
		  
		  
		if($operation=="delete"){ 
			$query = mysqli_query($dbcon,"DELETE FROM `lecture_hall_tab` WHERE `lecture_hall_id` = '".$sdata."'");
	if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }	
		}

		if($operation=="insert"){
	$generatedid = "PUCLH" .substr($_POST['sdata'],0,4).date('YmdHis');
  $gid = encrypt($generatedid);
  $query = mysqli_query($dbcon,"INSERT INTO `lecture_hall_tab`(`lecture_hall_name`, `lecture_hall_id`)  VALUES ('".encrypt($_POST['sdata'])."','".$gid."')");

  if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }
			
			
		}
	

		
	  } 
	
  if($data == "slecturer"){
	$sql = mysqli_query($dbcon,"SELECT * FROM `lecturer_tab` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	$arr[] = array("ldid"=>"", "ldname"=>"");
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		$arr[] = array("ldid"=>decrypt($fetch['lec_id']), "ldname"=>decrypt($fetch['lec_title'])." ".decrypt($fetch['lec_fname'])." ".decrypt($fetch['lec_lname']));
		array_push($arr);
}


$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}  
	  
  }
  
  
  
  		 if($data=="ay"){
		  if($operation=="fetch"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `academic_year_tab` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	$arr[] = array("ayid"=>"", "ayname"=>"");
		array_push($arr);
	while($fetch = mysqli_fetch_assoc($sql)){
		$arr[] = array("ayid"=>decrypt($fetch['ay_id']), "ayname"=>decrypt($fetch['academic_year']));
		array_push($arr);
}


$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
	
		if($operation=="fetchrec"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `academic_year_tab` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	while($fetch = mysqli_fetch_assoc($sql)){
	$arr[] = array("ayid"=>decrypt($fetch['ay_id']), "ayname"=>decrypt($fetch['academic_year']));
		array_push($arr);
}

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
		  
		  
		if($operation=="delete"){ 
			$query = mysqli_query($dbcon,"DELETE FROM `academic_year_tab` WHERE `ay_id` = '".$sdata."'");
	if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }	
		}

		if($operation=="insert"){
	$generatedid = "PUCAY" .substr($_POST['stdate'],0,4).substr($_POST['endate'],0,4).date('YmdHis');
  $gid = encrypt($generatedid);
  $query = mysqli_query($dbcon,"INSERT INTO `academic_year_tab`( `academic_year`, `ay_id`) VALUES ('".encrypt($_POST['stdate'].'/'.$_POST['endate'])."','".$gid."')");

  if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error");  
  }
			
			
		}
	

		
	  } 
	
  
  	 if($data=="finance"){

	
		if($operation=="fetchrec"){ 
$sql = mysqli_query($dbcon,"SELECT * FROM `debit_and_credit` ");  

if(mysqli_num_rows($sql)<1){
	echo json_encode("No records available");
}else{
	$arr = array();
	while($fetch = mysqli_fetch_assoc($sql)){
	$arr[] = array("finid"=> $fetch['id'],  "findate"=> decrypt($fetch['date_of_activity']), "sid"=> decrypt($fetch['student_id']), "reason"=> decrypt($fetch['reason']), "balance"=> decrypt($fetch['amount']));
		array_push($arr);
}

$myjson = json_encode($arr,JSON_UNESCAPED_SLASHES);

echo $myjson;
}
		  }
		  
		 

		if($operation=="insert"){
	$generatedid = "PUCFC" .substr($_POST['stdate'],0,4).substr($_POST['endate'],0,4).date('YmdHis');
  $gid = encrypt($generatedid);
  $query = mysqli_query($dbcon,"INSERT INTO `debit_and_credit`( `student_id`, `date_of_activity`, `reason`, `amount`, `transaction_type`) VALUES ('".encrypt($_POST['sid'])."','".encrypt($_POST['sdate'])."','".encrypt($_POST['reason'])."','".encrypt($_POST['bal'])."','".encrypt($_POST['transaction'])."')");

  if($query){
	 $getstudent = mysqli_query($dbcon, "SELECT * FROM `student_finance` WHERE `student_id` = '".encrypt($_POST['sid'])."'"); 
	 
	 if(mysqli_num_rows($getstudent)<1){
	$insertsql = mysqli_query($dbcon, "INSERT INTO `student_finance`( `student_id`, `amt_remaining`) VALUES ('".encrypt($_POST['sid'])."','".encrypt('0')."')");	
	
	if($insertsql){
	if($_POST['transaction']=="Credit"){
	$famt = 0 + str_replace(',','',$_POST['bal']);	
	$usql = mysqli_query($dbcon, "UPDATE `student_finance` SET `amt_remaining`='".encrypt($famt)."' WHERE `student_id` = '".encrypt($_POST['sid'])."'");	
	if($usql){
	echo json_encode("successful");		
	}else{
	echo json_encode("error");		
	}
	}else{
	$famt = 0 - str_replace(',','',$_POST['bal']);	
	$susql = mysqli_query($dbcon, "UPDATE `student_finance` SET `amt_remaining`='".encrypt($famt)."' WHERE `student_id` = '".encrypt($_POST['sid'])."'");	
	if($susql){
	echo json_encode("successful");		
	}else{
	echo json_encode("error");		
	}	
	}	
	}else{
		echo json_encode("error");
	}
	
	 }else{
		
		while($sfetch = mysqli_fetch_assoc($getstudent)){
			$nbal = decrypt($sfetch['amt_remaining']);
			if($_POST['transaction']=="Credit"){
	$famt = $nbal + str_replace(',','',$_POST['bal']);	
	$ssql = mysqli_query($dbcon, "UPDATE `student_finance` SET `amt_remaining`='".encrypt($famt)."' WHERE `student_id` = '".encrypt($_POST['sid'])."'");	
	if($ssql){
	echo json_encode("successful");		
	}else{
	echo json_encode("error");		
	}
	}else{
	$famt = $nbal - str_replace(',','',$_POST['bal']);	
	$sql = mysqli_query($dbcon, "UPDATE `student_finance` SET `amt_remaining`='".encrypt($famt)."' WHERE `student_id` = '".encrypt($_POST['sid'])."'");	
	if($sql){
	echo json_encode("successful");		
	}else{
	echo json_encode("error");		
	}	
	}
		}

		
	 }
	  
	 
  }else{
	echo json_encode("error");  
  }
			
			
		}
	

		
	  } 
	
  
  }
  
  
  
  ?>