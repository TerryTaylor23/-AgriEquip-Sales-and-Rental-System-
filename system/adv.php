<?php
session_start();
$conn =mysqli_connect("localhost","root","","agriculture");
if (!isset($_SESSION['fname'])) {
  header("location:signup.php");
} else{ ?>
<!DOCTYPE html>
<html>
  <head>
    <title>ADD VENDOR</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="icon" type="image/jpg" href="profile/lg.jpg">
    <style type="text/css">
    body {
      font-family: "Lato", sans-serif;
      background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url("profile/Getty.jpg");
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
    </style>
  </head>
   <body>

    <nav class="navbar navbar-expand-lg navbar-light"><i class="fa fa-tachometer fa-lg fa-fw" aria-hidden="true" style="color:blue;"></i>
      <a class="navbar-brand"><b class="text-light"> <img src="profile/avatar.png" alt="Avatar" class="avatar"><?php echo $_SESSION['fname']; ?></b></a>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          </li>
        </ul>
        <a href="admin.php" class="btn btn-info" style="color:black; text-decoration: none;">BACK</a>
      </div>
    </nav>
    
    <div class="container">
      <div class="row justify-content-center pt-5">
        <div class="col-md-5">
          <div class="card" style="background-color:#009688;">
            <div class="card-header">
              <h3 class="text-center">ADD VENDOR</h3>
              <form class="my-5" action="action.php?advendor" method="POST"  enctype="multipart/form-data">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" placeholder="name" class="form-control" required >
                </div>
                <div class="form-group">
                  <label>sname</label>
                  <input type="text" name="sname" placeholder="sname" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Gender</label>
                  <select name="sex">
                   <option value="male">Male</option>
                   <option  value="Female">Female</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nation id</label>
                  <input type="number" name="nationid" placeholder="National-id" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>phone number</label>
                  <input type="phone-number" name="pn" class="form-control"  placeholder="Tel-no" required>
                </div>
                <div class="form-group">
                  <label>password</label>
                  <input type="password" name="ps" class="form-control"  placeholder="pass" required>
                </div>
                <div class="form-group">
                  <input type="hidden" name="role" class="form-control"  value="vendor">
                </div>
                <input type="submit" name="addvendor" value="ADD" class="btn btn-success my-3" >
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>
<?php } ?>