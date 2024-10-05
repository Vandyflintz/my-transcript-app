<?php

include 'encrypt.php';
function freshencrypt($value){
	$key = hex2bin("0123456789abcdef0123456789abcdef");
		$iv = hex2bin("abcdef9876543210abcdef9876543210");
	return openssl_encrypt($value, 'AES-128-CBC', $key, 0, $iv);  
  }
function newdecrypt($value){
	$key = hex2bin("0123456789abcdef0123456789abcdef");
		$iv = hex2bin("abcdef9876543210abcdef9876543210");	
			
		$value = openssl_decrypt($value, 'AES-128-CBC', $key, 0, $iv);
		return trim($value);  
}

echo "Name with encrypt : ".encrypt("Anthony Vandyck Quartey of Vandyflintz Group of Companies who lives at Atlanta Georgia in the United States of America")."<br>Name with freshencrypt : ".freshencrypt("Anthony Vandyck Quartey of Vandyflintz Group of Companies who lives at Atlanta Georgia in the United States of America")."<br/><br/>decrypted name : ".decrypt("ZHrviyumAt2I0/vXlqXCY9QpMi3lsp8JG4sXetV1U9SLXAnORrN7273OahX+tqpFji2upkR7VlkN0EGIUCOmr696+puvmPLFjuKYhpfwCxtw9IOK3IEmWJmirJY3xkIrQTW9mJkQK2rs58TAR6KliDLBBLKNcKRtHlztSMoiQ34=
")."<br/><br/>"."Lecturer : ".encrypt("Student")."<br/><br/>Administrator : ".encrypt("Administrator");

echo "<br/><br/>tr2022system : ".encrypt("tr2022system")."<br/><br/>grizzly : ".encrypt("grizzly")."<br/><br/>Admin : ".encrypt("adm2022")."<br/><br/>";
echo encrypt("2015-08-12")."\n".encrypt("2011-09-02")."\n".encrypt("2005-06-15")."\n"."<br/><br/>";
echo decrypt("gRe8kGiNzyDfO2apF9UH5Q==")."<br/><br/>".decrypt("EbCKJLzu9Gn8a3wnOL685w==")."<br/><br/>".decrypt("z1pbHwkbaf/XouBczas8ww==");

$a="sell";
if($a="sell"){
	echo "true =";
}else{
	echo "false =";
}
if($a=="sell"){
	echo "true ==";
}else{
	echo "false =";
}

echo "<br/><br/><br/>Semesters: ";
echo "First : ".encrypt("First")." ID : ".encrypt("PUCS" .substr("First",0,4).date('YmdHis'))."<br/><br/>";
echo "Second : ".encrypt("Second")." ID : ".encrypt("PUCS" .substr("Second",0,4).date('YmdHis'));
echo "<br/><br/>";
$a =  "15,000";
$b = "5000";
$c = $b - str_replace(',', '',$a);
echo $c."<br><br>".decrypt("rRB/Mgb0SflEMdoNY2cSig==");

echo "<br><br>Lec : ".decrypt("MZSBZlb0tMXkGyK10k3qgw==")."<br><br>".decrypt("mMSZ2cbCvU5pkijO99CaLQ==")."<br>".encrypt("1200")."<br/>".decrypt("04w7E3OwkbNyO9tMiafyUQ==")."<br><br>".encrypt("1998-09-10")."<br><br>".encrypt("1996-04-15");


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

list($a, $b) = getgrades("78", "3");
echo"<br><br>".$a. " - ".$b;
?>