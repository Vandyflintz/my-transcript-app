<?php
$dbcon=mysqli_connect("localhost","root","christabel02","transcript_proj");  

if($dbcon){
echo "connected";
}else{
    echo "error";
}

?>