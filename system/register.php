<?php
$conn=mysqli_connect("localhost","root","","agriculture");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>REGISTER</title>
<link rel="stylesheet" type="text/css" href="login.css">
<link href="css/popup_style.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="profile/lg.jpg">
	<style>
		label{
			color: aliceblue;
		}
		b{
			color:aliceblue;
		}
		p b{
			color: aliceblue;
		}
	</style>
</head>
<body>
	<form class="roc" action="regist.php" method="POST">
	    <h1>Register</h1>
		<input type="text" name="fname" placeholder="first name">
		<input type="text" name="lname" placeholder="last name">
        <label><b>Gender</b></label>
        <select name="sex">
        	<option value="male">Male</option>
        	<option  value="Female">Female</option>
        </select>
        <input type="number" name="nationid" id="nation" placeholder="National-id" required>
        <input type="phone-number" name="mobile" placeholder="phone-number">
		<input type="password" name="pass" placeholder="password" required>
		<input type="submit" name="submit" id="reg" value="Submit"></div>
		<input type="hidden" name="role" value="user"  >
		<div class="word">
		<span>Already have an account</span>
		<span><a href="signup.php">LOGIN</a></span>
	</div>
	</form>
<p align="center"><b>&copy 2021</b></p>
<script src ="kuka/js/jquery-3.4.1.slim.min.js"></script>
<script src="kuka/js/popper.min.js"></script>
<script  src ="kuka/js/bootstrap.min.js"></script>
<script src ="js/sweetalert.min.js"></script>
<script>
 $("#reg").click(function(){
    var nation =$("#nation").val();
     if (nation == '') 
        {
        	swal({
		    title:"Empty field",
		    text:"Check missing field",
		    icon:"warning",
		    button:"okay",
		    });
        }
        else
        {
 	      alert("REGISTRATION COMPLETE");
        }
        }); 
</script>>	
</body>
</html>