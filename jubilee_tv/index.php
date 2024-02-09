<?php
include 'action.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRESEENTER DETAILS</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
        <a class="nav-link" href="#">Following</a>
      </li>
    </ul>
     </div>
     <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button>
  </form>
</nav>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10">
 <h3 class="text-center tex-dark mt-2 my-3">JUBILEE TV PRESENTERS' DATA</h3>
 <hr> 
 <?php if(isset($_SESSION['response'])){ ?> 
  <div class="alert alert-<?= $_SESSION['res_type'] ?> alert-dismissible text-center"  >
    <button type="button" class="close" data-dismiss="alert" >&times;
   </button>
   <?= $_SESSION['response']; ?>
   </div>
   <?php } unset($_SESSION['response']) ?>
</div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <h3 class="text-center text-info">New Presenter</h3>
      <form action="action.php" method="post" enctype="multipart/form-data">
     <input type="hidden" name="id" value="<?=$id; ?>" >
      <div class="form-group">
        <input type="hidden" name="oldimage" value="<?= $photo; ?>" >
        <input type="file" name="photo" value="<?=$photo ?>" class="form-control" class="custom-file" required>
        <img scr="<?= $photo; ?>" width="150" class="img-thumbnail">
      </div>
      <div class="form-group">
        <input type="text" name="name"value="<?= $name; ?>" class="form-control" placeholder="Enter presenter name" required>
      </div>
      <div class="form-group">
        <input type="text" name="show" value="<?= $show; ?>"  class="form-control" placeholder="Enter show" required>
      </div>  <div class="form-group">
        <input type="email" name="email" value="<?= $email; ?>"  class="form-control" placeholder="Enter presenter email" required>
      </div>
      <div class="form-group">
        <input type="text" name="phone" value="<?= $phone; ?>"  class="form-control" placeholder="Enter presenter number" required>
      </div>
      <div class="form-group">
        <?php if($update==true){ ?>
          <input type="submit" name="update" value="Update Presenter" class="btn btn-success btn-block" >
        <?php } else { ?>

        <input type="submit" name="add" value="Add Presenter" class="btn btn-primary btn-block" >
        <?php } ?>
      </div>
      </form>
   
   
    </div>
    <div class="col-md-8">  
   <h3 class="text-center text-info">Current Presenters' Records</h3>

    <table class="table table-hover">
    <thead>
      <tr>
        <th>PS No.</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Show</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php

  $sql="SELECT * FROM `presenters`";
  $result=mysqli_query($con,$sql);
  if($result){
    while($row=mysqli_fetch_assoc($result)){
      $id=$row['id'];
      $photo=$row['photo'];
      $name=$row['name'];
      $show=$row['tv_show'];
      $email=$row['email'];
      $phone=$row['phone'];
   

      echo '  <tr>
      <td scope="row">'.$id.'</td>
      <td><img width="50" style="border-radius:50%" src='.$photo.' /></td>    
      <td>'.$name.' </td>
      <td>'.$show.' </td>
      <td>'.$email.'</td>
      <td>'.$phone.'</td>
     
     
      <td>
        <a href="details.php?details='.$id.'" class="badge badge-primary p-1">Details</a> |
        <a href="action.php?delete='.$id.'" class="badge badge-danger p-1" onclick="return confirm(Do you want to delete this presenter?);">Delete</a> |
        <a href="index.php?edit='.$id.'" class="badge badge-success p-1">Edit</a> 
      </td>    

    </tr> ';
    }
  }
 

  ?>

     
    </tbody>
  </table>
    </div>
  </div>
</div>
    
</body>
</html>