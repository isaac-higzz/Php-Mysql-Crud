<?php
$con = new mysqli('localhost','root','','jubileetv');
if($con){
   // echo "Connected to Database";
}else{
    die(mysqli_error($con));
}


?>