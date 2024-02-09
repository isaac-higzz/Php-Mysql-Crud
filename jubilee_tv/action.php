<?php
session_start();

    $update=false;
    $id="";
    $photo="";
    $name="";
    $show="";
    $email="";
    $phone="";


include 'connecting.php';
if(isset($_POST['add'])){
    $name=$_POST['name'];
    $show=$_POST['show'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    $photo=$_FILES['photo']['name'];
    $upload="uploads/" .$photo;
   

    $sql = "INSERT INTO presenters(name,tv_show,email,phone,photo) VALUES ('$name','$show','$email','$phone','$upload')";
    $result=mysqli_query($con,$sql);
    if($result){
       // echo "Record Inserted";
       move_uploaded_file($_FILE['photo']['tmp_name'], $upload);
       header('location:index.php');
       
    } else{
        die(mysqli_error($con));
    }
    
    $_SESSION['response']="Successfully Inserted to the database!";
    $_SESSION['res_type']="success";
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];

    $sql="DELETE FROM presenters WHERE id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
       // echo "Deleted   Successfully";
       header('location:index.php');
    }else{
        die(mysqli_error($con));
    }

    $_SESSION['response']="Successfully Deleted!";
    $_SESSION['res_type']="danger";

}


if(isset($_GET['edit'])){
    $id=$_GET['edit'];

    $sql ="SELECT * FROM presenters WHERE id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result); 
    $id=$row['id'];
    $photo=$row['photo'];
    $name=$row['name'];
    $show=$row['tv_show'];
    $email=$row['email'];
    $phone=$row['phone'];

    $id=$row['id'];
    $photo=$row['photo'];
    $name=$row['name'];
    $show=$row['tv_show'];
    $email=$row['email'];
    $phone=$row['phone'];

    $update=true;
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $show=$_POST['show'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    
    $oldimage=$_POST['oldimage'];
    $newimage=$_FILES['photo']['name'];
    

    move_uploaded_file($_FILES['photo']['tmp_name'], $newimage);

       $sql="UPDATE presenters SET name='$name',tv_show='$show',email='$email',phone='$phone',photo='$newimage' WHERE id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
    // --   echo "Updated Successfully";
      
    }else {
        die(mysqli_error($con));
    }
    $_SESSION['response']="Updated Successfully";
    $_SESSION['res_type']="primary";
    header('location:index.php');

}

?>
