<?php
 error_reporting(0);
  ob_start();
  require_once('../connection.php'); 
  ob_end_clean();
  include '../encrypt.php';
  
  
  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $_GET['id']; ?></title>
    <link rel="stylesheet" href="css/page.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/font-awesome.css"/>
	 <script type="text/javascript">
  
/*window.addEventListener('load', function(){
	//alert('welcome');
	window.title = <?php echo "'Report'"; ?>;
	window.print();
	
  });*/
  function printpdf(){
	  window.title = <?php echo "'Report'"; ?>;
	window.print();
  }
  </script>
  </head>
  <body>
  <?php
  //SELECT *, sum(marks.marks_got) as cmarks, sum(marks.total_marks) as omarks, CEILING(((sum(marks.marks_got))/(sum(marks.total_marks)))* 100) as avgmarks FROM `marks` left join class_tab on class_tab.class_id = marks.class_id left join courses on courses.course_id = class_tab.course_id left join academic_year_tab on academic_year_tab.ay_id = class_tab.ay_id where marks.level='100' and semester = 'First' and marks.student_id = ''  group by courses.course_id, marks.semester, marks.level
  
  //SELECT *, sum(marks.marks_got) as cmarks, sum(marks.total_marks) as omarks, CEILING(((sum(marks.marks_got))/(sum(marks.total_marks)))* 100) as avgmarks FROM `marks` left join class_tab on class_tab.class_id = marks.class_id left join courses on courses.course_id = class_tab.course_id where marks.level='100' and semester = 'First' and marks.student_id = '' group by courses.course_id, marks.semester, marks.level
  ?>
  <div id="printbtn"><input type="button" onclick="printpdf();" value="Print" style="padding: 10px 10px 10px 10px; padding-left:15px !important; padding-right:15px !important;"/></div>
  <!--puc,ghana p.o. box 59, abetifi-kwahu 3508 x 2480px-->
  <div class="maindiv" style="position:relative;">
  <div class= "subdiv" style="position:absolute; z-index:-1;">
  <img src="img/icon_two.png" style="width:350px; height:450px; top:42%; left:35%; opacity:0.09; position:absolute;"
  />
  </div>
  <div class= "subdiv">
  <table width="100%" style="border-bottom: 5px solid rgba(0,0,0,0.75); background:#5b76d026;">
  <tr>
  <td align="center">
  <img src="img/icon_two.png" class="fimg"/>
  <table align="center" style="margin-top:20px;">
  <tr><td align="center" class="h1">Presbyterian University College, Ghana</td></tr>
  <tr><td align="center" class="h2">Office of The Registrar</td></tr>
  <tr><td align="center">P.O. Box 59, Abetifi-Kwahu, Ghana </td></tr>
  <tr><td align="center">Tel : 0202277201 &nbsp;&nbsp;    Website : www.presbyuniversity.edu.gh</td></tr>
  </table>
  <div align="center" class="stitle">TRANSCRIPT OF ACADEMIC RECORD</div>
  </td><tr>
  
  
 
  <tr><td></td><tr>
  </table>
  <?php
  function getgrades($grades,  $crdthrs){
if($grades >= 80){
$grades = "A";
$gp = "4.00";	
$gradepoint = $gp * $crdthrs; 
}
else if($grades > 74 && $grades < 80){
$grades = "B+";	
$gp = "3.67";	
$gradepoint = $gp * $crdthrs;
}
else if($grades > 69 && $grades < 75){
$grades = "B";
$gp = "3.33";	
$gradepoint = $gp * $crdthrs;	
}else if($grades > 64 && $grades < 70){
$grades = "C+";
$gp = "3.00";	
$gradepoint = $gp * $crdthrs;	
}else if($grades > 59 && $grades < 65){
$grades = "C";
$gp = "2.67";	
$gradepoint = $gp * $crdthrs;	
}else if($grades > 54 && $grades < 60){
$grades = "D+";
$gp = "2.33";	
$gradepoint = $gp * $crdthrs;	
}else if($grades > 49 && $grades < 55){
$grades = "D";
$gp = "2.00";	
$gradepoint = $gp * $crdthrs;	
}else if($grades < 50){
$grades = "F";
$gp = "1.37";	
$gradepoint = $gp * $crdthrs;	
}

return array($grades, $gradepoint);	
	
}
  
  
  if(isset($_GET['id'])){
	$stddetails = mysqli_query($dbcon,"SELECT *, mp.programme_name as majname, minp.programme_name as minname FROM `students` left join admission_basis on admission_basis.admission_basis_id = students.basis_of_admission left join programme mp on mp.programme_code = students.major_prog left join programme minp on minp.programme_code = students.minor_prog  left join programme_type on programme_type.programme_type_id = students.programme_type WHERE `student_id` = '".encrypt($_GET['id'])."'");  
	$dfetch = mysqli_fetch_assoc($stddetails);
	$sid = decrypt($dfetch['student_id']);
	$name = decrypt($dfetch['title'])." ".decrypt($dfetch['firstname'])." ".decrypt($dfetch['lastname']);
	$dob = date('l, jS F, Y',(strtotime(decrypt($dfetch['dob']))));
	$admdate = date('l, jS F, Y',(strtotime(decrypt($dfetch['date_of_admission']))));
	$paddr = decrypt($dfetch['name_and_address_of_parent_or_guardian']); 
	$sex = decrypt($dfetch['gender']);
	$boa = decrypt($dfetch['admission_basis_name']);
	$deg = decrypt($dfetch['programme_type_name']);
	$maj = decrypt($dfetch['majname']);
	$min = decrypt($dfetch['minname']);
	if(decrypt($dfetch['date_of_qualification_conferred'])==""){
		$qualdate = "";
	}else{
		$qualdate = date("l, jS F, Y", (strtotime(decrypt($dfetch['date_of_qualification_conferred']))));
	}
  }
  //
  ?>
  
  
  <table width="90%" style="margin-top:10px;">
   <tr>
  <td style="padding:10px 10px 10px 10px;">
  <table style="width:100%" cellspacing="0" border="1">
  <tr>
  <td style="width:190px;">ID Number</td>
  <td><?php echo $sid; ?></td>
  </tr>
  <tr>
  <td style="width:190px;">Name</td>
  <td><?php echo $name; ?></td>
  </tr>
  <tr>
  <td style="width:190px;">Birthdate</td>
  <td><?php echo $dob; ?></td>
  </tr>
  <tr>
  <td style="width:190px;">Date of Admission</td>
  <td><?php echo $admdate; ?></td>
  </tr>
  <tr>
  <td style="width:190px;">Name/Address of Parent/Guardian</td>
  <td><?php echo $paddr; ?></td>
  </tr>
  <tr>
  <td style="width:190px;">Sex</td>
  <td><?php echo $sex; ?></td>
  </tr>
  <tr>
  <td style="width:190px;">Basis of Admission</td>
  <td><?php echo $boa; ?></td>
  </tr>
  <tr>
  <td style="width:190px;">Degree</td>
  <td><?php echo $deg; ?></td>
  </tr>
  <tr>
  <td style="width:190px;">Major</td>
  <td><?php echo $maj; ?></td>
  </tr>
  <tr>
  <td style="width:190px;">Minor</td>
  <td><?php echo $min; ?></td>
  </tr>
  <tr>
  <td style="width:190px;">Date Degree Conferred</td>
  <td><?php echo $qualdate; ?></td>
  </tr>
  <tr>
  </table>
  </td>
  <tr>
  </table>
  
  <?php
  $lev1Fsem = mysqli_query($dbcon,"SELECT *, courses.course_id as coid, sum(marks.marks_got) as cmarks, sum(marks.total_marks) as omarks, CEILING(((sum(marks.marks_got))/(sum(marks.total_marks)))* 100) as avgmarks FROM `marks` left join class_tab on class_tab.class_id = marks.class_id left join courses on courses.course_id = class_tab.course_id left join academic_year_tab on academic_year_tab.ay_id = class_tab.ay_id where marks.level='100' and semester = 'First' and marks.student_id = '".encrypt($_GET['id'])."'  group by courses.course_id, marks.semester, marks.level");
  if(mysqli_num_rows($lev1Fsem)<1){
	  echo "no data";
	  
  }else{
  
  
	$firstarr = array();
  while($first = mysqli_fetch_assoc($lev1Fsem)){
	$crdthrs = decrypt($first["credit_hours"]);
	$totalmarks = $first["avgmarks"];	
	list($a, $b) = getgrades($totalmarks, $crdthrs);  
	
	$schterm = "1st SEMESTER ".decrypt($first["academic_year"]);
	$coursenum = decrypt($first["coid"]);
	$coursename = decrypt($first["name_of_course"]);
	$grade = $a;
	$hp = $b;
	$firstarr[] = array("schoolterm"=>$schterm, "cnum"=>$coursenum, "cname"=>$coursename, "crdhrs"=>$crdthrs, "grade"=>$grade, "hp"=>$hp,"semgpa"=>"","cumgpa"=>"");
	array_push($firstarr);
  }
  $myfirstjson = json_encode($firstarr,JSON_UNESCAPED_SLASHES);

	//echo $myfirstjson;
  ?>
   <table width="90%" style="margin-top:10px; border-collapse:collapse; margin-left:10px;">
  <tr style="background:linear-gradient(rgba(0,0,10,1),black); color:white;">
  <td>School Term</td>
  <td>Course Number</td>
  <td style="width:280px;">Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tbody>
 <?php 
 $i=0;
 foreach($firstarr as $firstitem):?>
<tr> <td><?php if($i == 0){echo $firstitem['schoolterm']; }?></td>
  <td><?= $firstitem['cnum'] ?></td>
  <td><?= $firstitem['cname'] ?></td>
  <td><?= $firstitem['crdhrs'] ?></td>
  <td><?= $firstitem['grade'] ?></td>
  <td><?= $firstitem['hp'] ?></td>
  <td></td>
  <td></td> </tr>
	
<?php $i++; endforeach; ?>			
  </tbody>
  
  
  <tr >
  <td></td>
  <td></td>
  <td></td>
  <td><?php 
  $totalfirstsemcredit = 0;
  $totalfirsthp = 0;
  foreach($firstarr as $fitem){
	$totalfirstsemcredit += $fitem['crdhrs']; 
	$totalfirsthp += $fitem['hp']; 	
  }
  echo "<b>".$totalfirstsemcredit."</b>";
   ?></td>
  <td></td>
  <td><?php echo "<b>".$totalfirsthp."</b>"; ?></td>
  <td><?php $firstgpa = number_format(($totalfirsthp/$totalfirstsemcredit), 2); echo "<b>".$firstgpa."</b>";?></td>
  <td></td>

		
  </tr>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>

		
  </tr>
  </table>
  
  
  <?php
  
  }
  
  ?>
  
 
 <?php
  $lev1Ssem = mysqli_query($dbcon,"SELECT *, courses.course_id as coid, sum(marks.marks_got) as cmarks, sum(marks.total_marks) as omarks, CEILING(((sum(marks.marks_got))/(sum(marks.total_marks)))* 100) as avgmarks FROM `marks` left join class_tab on class_tab.class_id = marks.class_id left join courses on courses.course_id = class_tab.course_id left join academic_year_tab on academic_year_tab.ay_id = class_tab.ay_id where marks.level='100' and semester = 'Second' and marks.student_id = '".encrypt($_GET['id'])."'  group by courses.course_id, marks.semester, marks.level");
  if(mysqli_num_rows($lev1Fsem)<1){
	  echo "no data";
	  
  }else{
  
  
	$secondarr = array();
  while($second = mysqli_fetch_assoc($lev1Ssem)){
	$crdthrs = decrypt($second["credit_hours"]);
	$totalmarks = $second["avgmarks"];	
	list($a, $b) = getgrades($totalmarks, $crdthrs);  
	
	$schterm = "2nd SEMESTER ".decrypt($second["academic_year"]);
	$coursenum = decrypt($second["coid"]);
	$coursename = decrypt($second["name_of_course"]);
	$grade = $a;
	$hp = $b;
	$secondarr[] = array("schoolterm"=>$schterm, "cnum"=>$coursenum, "cname"=>$coursename, "crdhrs"=>$crdthrs, "grade"=>$grade, "hp"=>$hp,"semgpa"=>"","cumgpa"=>"");
	array_push($secondarr);
  }
  $mysecondjson = json_encode($secondarr,JSON_UNESCAPED_SLASHES);

	//echo $mysecondjson;
  ?>
   <table width="90%" style="margin-top:40px; border-collapse:collapse; margin-left:10px;">
  <tr style="background:linear-gradient(rgba(0,0,10,1),black); color:white;">
  <td>School Term</td>
  <td>Course Number</td>
  <td style="width:280px;">Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tbody>
 <?php 
 $i=0;
 foreach($secondarr as $seconditem):?>
<tr> <td><?php if($i == 0){echo $seconditem['schoolterm']; }?></td>
  <td><?= $seconditem['cnum'] ?></td>
  <td><?= $seconditem['cname'] ?></td>
  <td><?= $seconditem['crdhrs'] ?></td>
  <td><?= $seconditem['grade'] ?></td>
  <td><?= $seconditem['hp'] ?></td>
  <td></td>
  <td></td> </tr>
	
<?php $i++; endforeach; ?>			
  </tbody>
  
  
  <tr >
  <td></td>
  <td></td>
  <td></td>
  <td><?php 
  $totalsecondsemcredit = 0;
  $totalsecondhp = 0;
  foreach($secondarr as $fitem){
	$totalsecondsemcredit += $fitem['crdhrs']; 
	$totalsecondhp += $fitem['hp']; 	
  }
  echo "<b>".$totalsecondsemcredit."</b>";
   ?></td>
  <td></td>
  <td><?php echo "<b>".$totalsecondhp."</b>"; ?></td>
  <td><?php $secondgpa = number_format(($totalsecondhp/$totalsecondsemcredit), 2); echo "<b>".$secondgpa."</b>";?></td>
  <td></td>

		
  </tr>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td><?php $totalL1crd = $totalsecondsemcredit + $totalfirstsemcredit; 
echo "<b>".$totalL1crd."<b>";
  ?></td>
  <td></td>
  <td>
  <?php
$totalL1hp = $totalsecondhp + $totalfirsthp; 
echo "<b>".$totalL1hp."</b>";
  ?>
  </td>
  <td>
 
  </td>
  <td>
  <?php
	$cuml00gpa = number_format(( $totalL1hp/ $totalL1crd), 2);
	echo "<b>".$cum100gpa."<b>";
	$tcgpa = $totalL1hp/ $totalL1crd;
	echo $tcgpa;	
  ?>
  
  </td>

		
  </tr>
  </table>
  
  
  <?php
  
  }
  
  ?>
   
  
  
 
     <table style="position:absolute; left:10px; bottom:20px;">
  <tr>
  <td>Date:</td>
  <td style="padding-left:10px;"><?php echo date('jS F, Y',strtotime(date('Y-m-d'))); ?></td>
  </tr>
  <tr>
  <td>Remark:</td>
  <td style="padding-left:10px;">OFFICIAL COPY</td>
  </tr>
  
  
  </table>
  
   <table style="position:absolute; right:50px; bottom:20px; float:right;">
 
  <tr>
  <td align="center"><img src="img/pic.png" style="width:200px; height:60px; margin-left:170px;"/></td>
  </tr><tr>
  <td align="center"><div style="width:80px; margin-top:-23px;">_________________________________</div><div align="center" style="margin-left:190px;">Registrar</div></td>
  
  </tr>
  
  
  </table>

	

 
  </div>
  </div>

  <div class="maindiv" style="position:relative;">
  <div class= "subdiv" style="position:absolute; z-index:-1;">
  <img src="img/icon_two.png" style="width:350px; height:450px; top:42%; left:35%; opacity:0.09; position:absolute;"
  />
  </div>
  <div class= "subdiv">
    <table width="100%" style="border-bottom: 5px solid rgba(0,0,0,0.75); background:#5b76d026;">
  <tr>
  <td align="center">
  <table align="center" style="margin-top:20px;">
  <tr><td align="center" class="h1">Presbyterian University College, Ghana</td></tr>
 
  </table>
  <div align="center" class="stitle">TRANSCRIPT OF ACADEMIC RECORD</div>
  </td><tr>
 <tr><td></td><tr>
  </table>
  
  <table style="width:90%; margin-top:10px; margin-left: 10px;" cellspacing="0" border="1">
  <tr>
  <td style="width:190px; padding-left:10px;">Name</td>
  <td></td>
  </tr>
  <tr>
  <td style="width:190px; padding-left:10px;">Degree</td>
  <td></td>
  </tr>
  <tr>
  <td style="width:190px; padding-left:10px;">Major</td>
  <td></td>
  </tr>
  <tr>
  <td style="width:190px; padding-left:10px;">Minor</td>
  <td></td>
  </tr>
  </table>
  
  
   
  <table width="90%" style="margin-top:60px; border-collapse:collapse; margin-left:10px;">
  <tr style="background:linear-gradient(rgba(0,0,10,1),black); color:white;">
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr>
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>1</td>
  <td></td>

		
  </tr>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>2</td>

		
  </tr>
  </table>
  
   
  <table width="90%" style="margin-top:60px; border-collapse:collapse; margin-left:10px;">
  <tr style="background:linear-gradient(rgba(0,0,10,1),black); color:white;">
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr>
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>1</td>
  <td></td>

		
  </tr>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>2</td>

		
  </tr>
  </table>
  
  
  
    <table style="position:absolute; left:10px; bottom:20px;">
  <tr>
  <td>Date:</td>
  <td style="padding-left:10px;"><?php echo date('jS F, Y',strtotime(date('Y-m-d'))); ?></td>
  </tr>
  <tr>
  <td>Remark:</td>
  <td style="padding-left:10px;">OFFICIAL COPY</td>
  </tr>
  
  
  </table>
  
   <table style="position:absolute; right:50px; bottom:20px; float:right;">
 
  <tr>
  <td align="center"><img src="img/pic.png" style="width:200px; height:60px; margin-left:170px;"/></td>
  </tr><tr>
  <td align="center"><div style="width:80px; margin-top:-23px;">_________________________________</div><div align="center" style="margin-left:190px;">Registrar</div></td>
  
  </tr>
  
  
  </table>
  </div>
  </div>
  
  
  
  <div class="maindiv" style="position:relative;">
  <div class= "subdiv" style="position:absolute; z-index:-1;">
  <img src="img/icon_two.png" style="width:350px; height:450px; top:42%; left:35%; opacity:0.09; position:absolute;"
  />
  </div>
  <div class= "subdiv">
    <table width="100%" style="border-bottom: 5px solid rgba(0,0,0,0.75); background:#5b76d026;">
  <tr>
  <td align="center">
  <table align="center" style="margin-top:20px;">
  <tr><td align="center" class="h1">Presbyterian University College, Ghana</td></tr>
 
  </table>
  <div align="center" class="stitle">TRANSCRIPT OF ACADEMIC RECORD</div>
  </td><tr>
 <tr><td></td><tr>
  </table>
  
  <table style="width:90%; margin-top:10px; margin-left: 10px;" cellspacing="0" border="1">
  <tr>
  <td style="width:190px; padding-left:10px;">Name</td>
  <td></td>
  </tr>
  <tr>
  <td style="width:190px; padding-left:10px;">Degree</td>
  <td></td>
  </tr>
  <tr>
  <td style="width:190px; padding-left:10px;">Major</td>
  <td></td>
  </tr>
  <tr>
  <td style="width:190px; padding-left:10px;">Minor</td>
  <td></td>
  </tr>
  </table>
  
  
   
  <table width="90%" style="margin-top:60px; border-collapse:collapse; margin-left:10px;">
  <tr style="background:linear-gradient(rgba(0,0,10,1),black); color:white;">
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr>
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>1</td>
  <td></td>

		
  </tr>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>2</td>

		
  </tr>
  </table>
  
   
  <table width="90%" style="margin-top:60px; border-collapse:collapse; margin-left:10px;">
  <tr style="background:linear-gradient(rgba(0,0,10,1),black); color:white;">
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr>
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>1</td>
  <td></td>

		
  </tr>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>2</td>

		
  </tr>
  </table>
  
  
  
    <table style="position:absolute; left:10px; bottom:20px;">
  <tr>
  <td>Date:</td>
  <td style="padding-left:10px;"><?php echo date('jS F, Y',strtotime(date('Y-m-d'))); ?></td>
  </tr>
  <tr>
  <td>Remark:</td>
  <td style="padding-left:10px;">OFFICIAL COPY</td>
  </tr>
  
  
  </table>
  
   <table style="position:absolute; right:50px; bottom:20px; float:right;">
 
  <tr>
  <td align="center"><img src="img/pic.png" style="width:200px; height:60px; margin-left:170px;"/></td>
  </tr><tr>
  <td align="center"><div style="width:80px; margin-top:-23px;">_________________________________</div><div align="center" style="margin-left:190px;">Registrar</div></td>
  
  </tr>
  
  
  </table>
  </div>
  </div>
  
  <div class="maindiv" style="position:relative;">
  <div class= "subdiv" style="position:absolute; z-index:-1;">
  <img src="img/icon_two.png" style="width:350px; height:450px; top:42%; left:35%; opacity:0.09; position:absolute;"
  />
  </div>
  <div class= "subdiv">
    <table width="100%" style="border-bottom: 5px solid rgba(0,0,0,0.75); background:#5b76d026;">
  <tr>
  <td align="center">
  <table align="center" style="margin-top:20px;">
  <tr><td align="center" class="h1">Presbyterian University College, Ghana</td></tr>
 
  </table>
  <div align="center" class="stitle">TRANSCRIPT OF ACADEMIC RECORD</div>
  </td><tr>
 <tr><td></td><tr>
  </table>
  
  <table style="width:90%; margin-top:10px; margin-left: 10px;" cellspacing="0" border="1">
  <tr>
  <td style="width:190px; padding-left:10px;">Name</td>
  <td></td>
  </tr>
  <tr>
  <td style="width:190px; padding-left:10px;">Degree</td>
  <td></td>
  </tr>
  <tr>
  <td style="width:190px; padding-left:10px;">Major</td>
  <td></td>
  </tr>
  <tr>
  <td style="width:190px; padding-left:10px;">Minor</td>
  <td></td>
  </tr>
  </table>
  
  
   
  <table width="90%" style="margin-top:60px; border-collapse:collapse; margin-left:10px;">
  <tr style="background:linear-gradient(rgba(0,0,10,1),black); color:white;">
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr>
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>1</td>
  <td></td>

		
  </tr>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>2</td>

		
  </tr>
  </table>
  
   
  <table width="90%" style="margin-top:60px; border-collapse:collapse; margin-left:10px;">
  <tr style="background:linear-gradient(rgba(0,0,10,1),black); color:white;">
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr>
  <td>School Term</td>
  <td>Course Number</td>
  <td>Course Title</td>
  <td>Sem Credit</td>
  <td>Sem Grade</td>
  <td>Honor Point</td>
  <td>Sem GPA</td>
  <td>Cum GPA</td>

		
  </tr>
  <tr >
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>1</td>
  <td></td>

		
  </tr>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>2</td>

		
  </tr>
  </table>
  
  
  
    <table style="position:absolute; left:10px; bottom:20px;">
  <tr>
  <td>Date:</td>
  <td style="padding-left:10px;"><?php echo date('jS F, Y',strtotime(date('Y-m-d'))); ?></td>
  </tr>
  <tr>
  <td>Remark:</td>
  <td style="padding-left:10px;">OFFICIAL COPY</td>
  </tr>
  
  
  </table>
  
   <table style="position:absolute; right:50px; bottom:20px; float:right;">
 
  <tr>
  <td align="center"><img src="img/pic.png" style="width:200px; height:60px; margin-left:170px;"/></td>
  </tr><tr>
  <td align="center"><div style="width:80px; margin-top:-23px;">_________________________________</div><div align="center" style="margin-left:190px;">Registrar</div></td>
  
  </tr>
  
  
  </table>
  </div>
  </div>
  
 
  
  
  </body>
  </html>