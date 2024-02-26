
<?php
session_start();

$login=0;
$invalid=0;
//connects to the database
include 'connect.php';
if(isset($_POST['login']))//checks if you have posted the name and password
{
    $email=$_POST['email'];
    $pass=$_POST['password'];//this is the password you insert
    $password=md5($pass);//then after you encrypt it using the md5 algorith

   $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
    $results = mysqli_query($con,$sql);
    // if($results)
    // var_dump($results);
    if($results)
    {
        $num=mysqli_num_rows($results);//checks the number of rows in a database
        if($num>0)
        {
            // echo "<script>alert('logged in successfully')</script>";
             header('Location:index.php');
             $login=1;
             //this session is set to store data for the email
              $_SESSION['email'] = $email;

        }else{
            // echo "<script>alert('Wrong password')</script>";
            $invalid=1;

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
  background-image: url("uploads/jub.jpg");
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
        <form class="form-inline" action="/action_page.php">
             <input class="form-control mr-sm-2" type="text" placeholder="Search">
             <button class="btn btn-primary" type="submit">Search</button>
             <button type="button" class="btn btn-success" style="border-radius:10px;    border-color: white;    border-width:1px; margin-left:20px; padding:2px; font-size:13px; outline: none;"><a href="signup.php"  style="text-decoration:none; color:white">Sign Up</a></button>
        </form>
    </nav>
<div class="text-center"><img style="border-radius:50%;width:100px ;margin-top:5%;margin-bottom:0" src="uploads/admin.jpg" alt=""></div>
    <div class="container mt-5"  >
     <div class="row justify-content-center" >
        <div class="col-md-5 mt-4 bg-info p-4 rounded" style="background-color:white;" >
            <h2 class="p-2 rounded text-center text-dark" ><p style="background-color:white;margin-left:100px;padding:8px; pointer:cursor;border-bottom: 4px solid grey; font-size:15px ;width:200px" >Presenter Controller Login</h2>
              <div class="container m-2 " >
                <form action="Login.php" method="post" >
                <?php
        if($invalid)
        {
          echo '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Error! </strong> Invalid credentials.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
          </button>
          </div>
          ';
        }
         ?>

      <?php
if($login)
        {
          echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Success</strong> Successfully Logged in
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
          </button>
          </div>
          ';
        }
         ?>
                 <div class="form-group text-light">
                      <label >Email</label>
                      <input type="email" class="form-control" name="email"  placeholder="Enter your email" required>
                 </div>
                 <div class="form-group text-light">
                     <label >Password</label>
                     <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                 </div>
                    <button type="submit" name="login" class="btn btn-secondary w-100 ">Login</button>
                </form>
             </div>
        </div>
    </div>
</div>
</body>
</html>



<!-- <?php
//my early tried up codes backup
$login=0;
$invalid=0;
include 'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST')//if the signup button is pressed,it will check if 
                                      //the data below is posted                               
{
  $email=$_POST['email'];//the email to be posted wil be stored in the variable email
  $new_password=$_POST['password'];//stored in variable
  $hashed_password = password_hash($new_password,PASSWORD_DEFAULT);


  //check from database the user signed up already
    $sql = "SELECT email FROM users WHERE password='$hashed_password'";
    $result=mysqli_query($con, $sql);
    if($result)
    {
      $num=mysqli_num_rows($result);//checks the number of rows in a database
      if($num>0)//checks if the number of rows is not more than 1
      {
       if(password_verify($new_password , $hashed_password))
       {
        // echo "Login successful";
        $login=1;
        header("location:index.php");
       }
         // echo "Invalid data";
        //  $invalid=1;
      }else
      {
        // echo "Invalid data";
        $invalid=1;
      }
    }



}


?> -->
