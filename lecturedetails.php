<?php
 error_reporting(0);
  ob_start();
  require_once('connection.php'); 
  ob_end_clean();
  include 'encrypt.php';
  
  
   if(isset($_POST['currAcaYr'])){
	 $year = encrypt($_POST['currAcaYr']);
	 $id = encrypt($_POST['id']);
	 $request = $_POST['request'];

	if($request=="fetchclasses"){
		$yearsql = mysqli_query($dbcon, "SELECT * FROM `current_academic_year`");
		$fetch = mysqli_fetch_assoc($yearsql);
		$curryear = $fetch['academic_year'];
		
		$sql = mysqli_query($dbcon,"SELECT * FROM `class_tab` left join courses on courses.course_id = class_tab.course_id left join section_tab on section_tab.section_id = class_tab.section_id left join time_tab on time_tab.time_id = class_tab.time_id left join lecturer_tab on lecturer_tab.lec_id = class_tab.lecturer_id left join lecture_hall_tab on lecture_hall_tab.lecture_hall_id = class_tab.lecture_hall_id left join academic_year_tab on academic_year_tab.ay_id = class_tab.ay_id where academic_year_tab.academic_year  = '".$curryear."' and lec_id = '".$id."' ");  

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
	
	 
	 if($request== "insert_marks"){
		  $query = mysqli_query($dbcon,"INSERT INTO `marks`(`assessment`, `student_id`, `marks_got`, `total_marks`, `class_id`, `level`, `semester`) VALUES ('".$_POST['asstype']."','".encrypt($_POST['sid'])."','".$_POST['marks']."','".$_POST['omarks']."','".encrypt($_POST['cid'])."','".$_POST['level']."','".$_POST['semester']."')");

  if($query){
	echo json_encode("successful");  
  }else{
	echo json_encode("error ".mysqli_error($dbcon));  
  } 
	 }  
	   
   }
  
  
  
  
  ?>