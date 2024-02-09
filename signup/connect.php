<?php

$con=new mysqli('localhost','root','','signup_form');
if($con){
 //   echo "Connection Successfull";

}else{
    die(mysqli_error($con));

}


?>