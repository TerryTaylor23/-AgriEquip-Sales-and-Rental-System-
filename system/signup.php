<?php
  $conn=mysqli_connect("localhost","root","","agriculture");
?>
<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8">
	   <title>LOGIN</title>
       <link rel="stylesheet" type="text/css" href="login.css">
       <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
       <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
	   <link rel="icon" type="image/jpg" href="profile/lg.jpg">
	</head>
	<style>
		*{
			margin: 0;
		}
		label{
			color: white;
		}
		b{
			color:white;
		}
		p b{
			color:white;
		}
		.echo{
			color:red;
			font-weight: bold;
			font-style:inherit;
			font-family: sans-serif;
		}
		.navbar ul li{
		list-style: none;
		display: inline-block;
		margin: 0 20px;
		position: relative;
	    } 
	    .navbar ul li a{
		text-decoration: none;
		color:white;
		font-weight: bold;
		}
       .navbar ul li::after{
    	content: '';
    	height: 3px;
    	width:0;
    	background:#009688;
    	position: absolute;
    	left: 0;
    	bottom:-10px;
    	transition: 0.8s;
        }
        .navbar ul li:hover::after{
    	width: 100%;
        }
	</style>
    <body>
	<div class="navbar">
			<ul>
				<li><a href="farm.html"><i class="fa fa-home" style="color:white;"></i>HOME</a></li>
			</ul>
		</div>
     <div class="container">
	<form class="roc" action="login.php" method="POST">
		<div class="brown">
		  <h1>LOGIN</h1>
		  <div class="echo">
		   <?php
			   session_start();

			     if(isset($_GET['pass']))
			     {
				  echo "Wrong Password or Username";
		          }
		   ?>
	      </div>
        <input type="text" name="nationid" id="nation" placeholder="National-id" required>
		<input type="password" name="pass" id="pass" placeholder="password" required>
		<input type="submit" id="sub" name="submit" value="Submit"></div>
		<div class="word">
		<span style="font-weight:bold;">Dont have an account</span>
		<span style="text-decoration: none;"><a href="register.php">REGISTER</a></span>
	</form>
</div>
<p align="center"><b>&copy 2021</b></p>
<script src ="kuka/js/jquery-3.4.1.slim.min.js"></script>
<script src="kuka/js/popper.min.js"></script>
<script  src ="kuka/js/bootstrap.min.js"></script>
<script src ="js/sweetalert.min.js"></script>
<script>
	 $("#sub").click(function(){
	 	var nation =$("#nation").val();
	 	var  pass =$("#pass").val();
         
        if (nation == '' || pass == '') 
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
        }
          
	   }); 
</script>
</body>
</html>