<?php
    $update=false;
    $id="";
    $photo="";
    $name="";
    $show="";
    $email="";
    $phone="";


include 'connect.php';//connection to the database

//below is my php code for inserting files in a database
if(isset($_POST['add'])){//checks if the add button is set to post or not
    //files to be added to your database
    $photo=$_FILES['photo']['name'];//img file stored in variable $photo
    $upload="uploads/" .$photo;//the photo variable asigned to another variable $upload concantinated with source loc
    $name=$_POST['name'];
    $show=$_POST['show'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];  
    //then we insert our data to the database 
    $sql = "INSERT INTO registration(name,tv_show,email,phone,photo) VALUES ('$name','$show','$email','$phone','$upload')";
    $result=mysqli_query($con,$sql);//checks if the process was successful
    if($result){//so if the process was successful then its displayed
       // echo "Record Inserted";
       move_uploaded_file($_FILES['photo']['tmp_name'], $upload);//function to upload photos
      header('location:index.php');
       
    } else{
        die(mysqli_error($con));//if not then brings error
    }
    
    //I set my sessions for alerts if inserted successfulyy
    $_SESSION['response']="Successfully Inserted to the database!";
    $_SESSION['res_type']="success";
}
//below am going to delete data from a database
if(isset($_GET['delete'])){//checks whether the delete parameter is present in the url
    $id=$_GET['delete'];//if true then its stored in a variable id
    //query to delete from database using variable id
    $sql="DELETE FROM registration WHERE id=$id";
    $result=mysqli_query($con,$sql);//process is successfully
    if($result){//so if success we continue
       // echo "Deleted   Successfully";
       header('location:index.php');
    }else{//if process to success,then brings error
        die(mysqli_error($con));
    }
    //create session for alerts of the delete process
    $_SESSION['response']="Successfully Deleted!";
    $_SESSION['res_type']="danger";

}

//below am going to edit data in the database
if(isset($_GET['edit'])){//checks whether the edit parameter is present in the url
    $id=$_GET['edit'];//if present then stored in a variable id
    //query to display my data to be edited
    $sql ="SELECT * FROM registration WHERE id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result); //fetches the result from the database and sotres in variable $row
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

//am going to update my data in the database
if(isset($_POST['update'])){//cheks if the update button is set to post
    $id=$_POST['id'];
    $name=$_POST['name'];
    $show=$_POST['show'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    
    $oldimage=$_POST['oldimage'];//variable for the old image
    $newimage=$_FILES['photo']['name'];//variable for the new image
    

    move_uploaded_file($_FILES['photo']['tmp_name'], $newimage);//function to upload new image 
    //then query to update data in the database
       $sql="UPDATE registration SET name='$name',tv_show='$show',email='$email',phone='$phone',photo='$newimage' WHERE id=$id";
    $result=mysqli_query($con,$sql);//process is successful
    if($result){//if process success then we continue
    // --   echo "Updated Successfully";
      
    }else {
        die(mysqli_error($con));
    }
    //we create our session for alert if the data is updated sucessful
    $_SESSION['response']="Updated Successfully";
    $_SESSION['res_type']="primary";
    header('location:index.php');

}

?>
