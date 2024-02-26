<?php
function check_login($con)//func is going to check if user is logged in_array
                           // so we are going to use sessions
{
  if(isset($_SESSION['email']))//checks if the user set is logged in or already in database
   {
    $id = $_SESSION['email'];
    $query = "SELECT * FROM `users` WHERE email = '$email' limit 1";//check from database if the user exists

    $result = mysqli_query($con,$query);//read our results
    if($result && mysqli_num_rows($result) > 0)//check if the results are right and only once
    {
        $user_data = mysqli_fetch_assoc($result);//fetches result from database and stores it in a variable user_data
        return $user_data; //now the result stored in the user_data is displayed
    }

   }//if user is doent not exit then is redirected to the login page
// header('location:login.php');

}     

