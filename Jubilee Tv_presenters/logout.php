<?php
session_start(); // first start the session
//then check if values are set
if(isset($_SESSION['email']))
{
    unset($_SESSION['email']);
}
//then redirect to the login,.php
header("Location: login.php");
die;

