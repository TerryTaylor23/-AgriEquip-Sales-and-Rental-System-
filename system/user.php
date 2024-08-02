<?php
  session_start();
if (!isset($_SESSION['fname'])) {
   header("location:signup.php");
 } else{
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User</title>
  <link rel="stylesheet" type="text/css" href="kuka/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="kuka/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="kuka/css/default.css">
  <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/jpg" href="profile/lg.jpg">
</head>
<style type="text/css">
  body {
  font-family: "Lato", sans-serif;
  background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url("profile/fm.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  min-height: 100vh;
  background-position: center;
}
.avatar {
    vertical-align: middle;
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
.card{
  background-color:white;
}
.card-header{
  background-color:#009688;
}
  .btn-outline-light{
    background-color:#009688;
  }
   .smu{
    color:#009688;
   }
</style>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand"><b class="text-dark"><img src="profile/profile0.png" alt="Avatar" class="avatar"><?php echo  $_SESSION['fname']; ?> <?php echo $_SESSION['lnm']; ?></b></a>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">

        </li>
                </li>
            </ul>
                 <a href="logout.php" class="fa fa-sign-out btn btn-info" style="color:white; text-decoration: none;">Logout</a>     

      </div>
    </nav>
    <div class="container mt-3 mb-3 space-top">
    <div class="row">
      <div class="col-md-12 text-center">
      <h4 class="text-muted">Welcome Dear Customer</br>You logged in as <?php echo  $_SESSION['fname']; ?> <?php echo $_SESSION['lnm']; ?> </h4>
      </div>
    </div>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-4">
          <a class="nav-link" href="cart.php" style="color:#ffff;">
            <div class="card-header text-white card-hover">
              <center>
                CART
              </center>
            </div>
            <div class="card">
              <div class="card-body text-center mt-5 rounded">
                <span><i class="fa fa-shopping-cart large" style="color:#009688;"></i></span>
                <p class="mt-3 mb-5"></p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a class="nav-link" href="viewprod.php" style="color:#ffff;">
            <div class="card-header text-white card-hover">
              <center>
                View Products
              </center>
            </div>
            <div class="card">
              <div class="card-body text-center mt-5 rounded">
                <span><i class="fa fa-shopping-basket large" style="color:#009688;"></i></span>
                <p class="mt-3 mb-5"></p>
              </div>
            </div>
          </a>
        </div>
         <div class="col-md-4">
          <a class="nav-link" href="odd.php" style="color:#ffff;">
            <div class="card-header text-white card-hover">
              <center>
                View Order
              </center>
            </div>
            <div class="card">
              <div class="card-body text-center mt-5 rounded">
                <span><i class=" fa fa-eye large" style="color:#009688;"></i></span>
                <p class="mt-3 mb-5"></p>
              </div>
            </div>
          </a>
        </div>
        <div class="container mt-2 mb-2 space-top">
          <div class="row">
            <div class="col-md-12 text-center">
              <h4 class="text-muted"></h4>
            </div>
          </div>
        </div>
</body>
</html>
<?php } ?>
