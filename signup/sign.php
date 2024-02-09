<?php
$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'connect.php';
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql="SELECT * FROM registration WHERE username='$username'";
  $result=mysqli_query($con,$sql);
  if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
      //echo "User already exits";
      $user=1;
    }else{
      $sql="INSERT INTO registration (username,password) VALUES ('$username','$password')";
  $result=mysqli_query($con,$sql);
  if($result){
        //echo "Sign Up Success";
        $success=1;
    } else {
        die(mysqli_error($con));
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

  <?php
  if($user){
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Oh no sorry</strong> User already exists
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    ';
  }
  ?>

<div class="container m-5">
<form action="sign.php" method="post">
  <div class="form-group ">
      <label>Name</label>
      <input type="name" class="form-control" name="username"  placeholder="Enter your username">
    </div>
  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter your password">
  </div>
  
  <button type="submit" class="btn btn-primary w-100">Submit</button>
</form>

</div>

</body>
</html>