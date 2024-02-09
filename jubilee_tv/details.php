<?php
include 'connecting.php';
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
<?php

if(isset($_GET['details'])){
    $id=$_GET['details'];

    $sql="SELECT * FROM presenters WHERE id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result); 
    $id=$row['id'];
    $photo=$row['photo'];
    $name=$row['name'];
    $show=$row['tv_show'];
    $email=$row['email'];
    $phone=$row['phone'];
    echo '
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3 bg-info p-2 rounded">
            <h2 class="bg-light p-2 rounded text-center text-dark">'.$id.'</h2>
            <div>
                <img src="'.$photo.'" width="300" class="img-thunbnail">        
            </div >
            <h4 class="text-light p-2 ">Name  : '.$name.' </h4>
            <h4 class="text-light  p-2">Show  : '.$show.' </h4>
            <h4 class="text-light  p-2">Email : '.$email.' </h4>
            <h4 class="text-light  p-2">Phone : '.$phone.' </h4>
        </div>
    </div>
</div>
    ';
}
    ?>

</body>
</html>