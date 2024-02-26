<?php

include  'connect.php';
if(isset($_POST['login']))
{
    $email=$_POST['email'];//the email to be posted wil be stored in the variable email
    $new_password=$_POST['password'];//stored in variable
    
    $Sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    if($result)
    {
       if($mysqli_num_rows($result) == 1)
       {
        $row = mysqli_fetch_assoc($result);

        $hashed_password = $row['password'];
        if(password_verify($new_password, $hashed_password))
        {
            echo 'Logged in Successfully';
        }else
        {
            echo "Invalid password";
        }
       } 
    }else
    {
        echo "Invalid email";
    }
   
}

?>

<!-- <?php

$login=0;
$invalid=0;
include 'connect.php';
if($_SERVER['REQUEST_METHOD']=='POST')//if the signup button is pressed,it will check if 
                                      //the data below is posted                               
{
  $email=$_POST['email'];//the email to be posted wil be stored in the variable email
  $password=$_POST['password'];//stored in variable


  //check from database the user signed up already
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result=mysqli_query($con, $sql);
    if($result)
    {
      $num=mysqli_num_rows($result);//checks the number of rows in a database
      if($num>0)//checks if the number of rows is not more than 1
      {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];
        if(password_verify($password,$hashed_password ))
        {
          $login=1;
          header("location:index.php");
        }else
        {
         
        }
        {
        // echo "Login successful";
        // $login=1;
        // header("location:index.php");
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