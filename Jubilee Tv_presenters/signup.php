<?php
session_start();
$user=0;//this sets an alert if the condition is false
$success=0;//sets a alert if the condition is true 

//connection to the database
include 'connect.php';

if(isset($_POST['signup']))//checks if the signup button is set to post
{
    $email=$_POST['email'];
    $pass=$_POST['password'];//this is the password entered while signing up
    $password=md5($pass);//then the password is encrtyped using the md5 method

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($con, $sql);
    if($result)
    {
      $num=mysqli_num_rows($result);//checks the number of rows in a database
      if($num>0)//checks if the number of rows is not more than 1
      {
        // echo "email exist";
        $user=1;
      }else
      {
    // $q=mysqli_query($con, "INSERT INTO `employee` (`name`,`email`,`password`) VALUES ('$name','$email','$password'");
    $sql = "INSERT INTO users (`email`,`password`) VALUES ('$email','$password')";
    //executes the query
    $results = mysqli_query($con,$sql);
    if($results)
    {
     // echo "<script>alert('signed up successfully')</script>";
      header("location:index.php");
    
    }else{
    
      }
   }
}
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Sign-Up page</title>
    
  </head>
  <body>
  <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
          body  {
            background-image: url("uploads/me.jpg");
            background-color: #cccccc;
            background-size:cover;
            background-repeat:no-repeat;

          }
    </style>
    <title>Login Page</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <!-- Brand -->
      <a class="navbar-brand" href="#">JUBILEE TV</a>

      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Shows</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Presenters</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Followers</a>
          </li>
        </ul>
        </div>
        <form class="form-inline" action="sign.php">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-primary" type="submit">Search</button>
          <button type="button" class="btn btn-secondary" style="border-radius:10px;    border-color: white;    border-width:1px; margin-left:20px; padding:3px; font-size:13px; outline: none;"><a href="Login.php"  style="text-decoration:none; color:white">Login</a></button>
        </form>
    </nav>

    <div class="text-center"><img style="border-radius:50%;width:100px ;margin-top:5%;margin-bottom:0" src="uploads/admin.jpg" alt=""></div>


    <div class="container mt-5"  >
        <div class="row justify-content-center" >
            <div class="col-md-5 mt-4 bg-info p-4 rounded" style="background-color:white;" >
                <h2 class="p-2 rounded text-center text-dark" ><p style="background-color:white;margin-left:100px;padding:8px; pointer:cursor;border-bottom: 4px solid grey; font-size:15px ;width:200px" >Controller Sign-Up</h2>
    <div class="container m-2 " > 
        <div class="container m-3" style="background-color:#219ebc;border-radius:10px">

        <?php
        if($user)
        {
          echo '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Oooh Sorry!</strong> Email already exists.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
          </button>
          </div>
          ';
        }
         ?>

      <?php
if($success)
        {
          echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Success</strong> Successfully Signed Up
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
          </button>
          </div>
          ';
        }
         ?>
            <form action="signup.php" method="post" >
                <div class="form-group text-light">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"  placeholder="Enter your email" required >
                </div>
                
                <div class="form-group text-light">
                  <label >Password</label>
                  <input type="password" class="form-control"  name="password" placeholder="Enter your password" required>
                </div>
                
                <button type="submit" name="signup" class="btn btn-success w-100 ">Sign Up</button>
            </form>
          </div>
        </div>
    </body>
</html>





























<!-- <?php
$user=0;
$success=0;
include 'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST')//if the signup button is pressed,it will check if 
                                      //the data below is posted                               
{
  $email=$_POST['email'];//the email to be posted wil be stored in the variable email
  $password=$_POST['password'];//stored in variable
  //then we hash our paasword ready for the database
  $hashed_password = password_hash($password,PASSWORD_DEFAULT);

  //check from database whether the user doent exist already
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($con, $sql);
    if($result)
    {
      $num=mysqli_num_rows($result);//checks the number of rows in a database
      if($num>0)//checks if the number of rows is not more than 1
      {
        // echo "email exist";
        $user=1;
      }else
      {
     //then write query to insert the data
       $sql="INSERT INTO users  (email,password) VALUES ('$email','$hashed_password')";
       $result=mysqli_query($con,$sql);
       if($result)
      {
        //  echo "Signed Up successfully";
        $success=1;
        header("Location:login.php");
      }else
      {
         die(mysqli_error($con));
      }
      }
    }



}


?> -->
