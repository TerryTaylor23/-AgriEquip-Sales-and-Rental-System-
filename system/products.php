<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
	 <meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <title>PRODUCTS</title>
	 <link rel="stylesheet" type="text/css" href="kuka/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="kuka/css/all.min.css">
     <link rel="stylesheet" type="text/css" href="kuka/css/default.css">
     <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
     <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
	 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	 <link href="css/popup_style.css" rel="stylesheet">
	 <link rel="icon" type="image/jpg" href="profile/lg.jpg">
    </head>
    <style type="text/css">
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}
	body{
		background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url("profile/fm.jpg");
		background-size: cover;
		background-repeat: no-repeat;
		min-height: 100vh;
		background-position: center;
	}
	button:hover{
		color: white;
		background-color: #F68B1E;
	}
	
</style> 
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=""><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="farm.html"><i class="fas fa-home">Home</i></a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<form action="cart.php" method="POST">
					<div class="card">
						<img src="profile/hv.jpeg" class="card-img-top">
						<div class="card-body text-center">
							<h5 class="card-title">Potato harvester</h5>
							<p class="card-text">Price:Tsh5,000 per day</p>
							<button type="submit" name="add" id="plus" class= btn btn-success ><i class="fa fa-shopping-cart"> Add To Cart</i></button>
						</div>
					</div>
				</form>	
			</div>
			<div class="col-lg-3">
				<form action="cart.php" method="POST">
					<div class="card">
						<img src="profile/hand track.jpg" class="card-img-top">
						<div class="card-body text-center">
							<h5 class="card-title">Hand Tractor</h5>
							<p class="card-text">Price:Tsh15,000 per day</p>
							<button type="submit" name="add" id="pls" class=btn btn-info><i class="fa fa-shopping-cart"> Add To Cart</i></button>
						</div>
					</div>
				</form>	
			</div>
			<div class="col-lg-3">
				<form action="cart.php" method="POST">
					<div class="card">
						<img src="profile/jd.png" class="card-img-top">
						<div class="card-body text-center">
							<h5 class="card-title">Tractor</h5>
							<p class="card-text">Price:Tsh50,000 per day</p>
							<button type="submit" name="add" id="plus" class=btn btn-info> <i class="fa fa-shopping-cart"> Add To Cart</i></button>
						</div>
					</div>
				</form>	
			</div>
			<div class="col-lg-3">
				<form action="cart.php" method="POST">
					<div class="card">
						<img src="profile/mounted-disc-plough.png" class="card-img-top">
						<div class="card-body text-center">
							<h5 class="card-title">Disc Plough</h5>
							<p class="card-text">Price:Tsh8,000 per day</p>
							<button type="submit" name="add" id="plus"class=btn btn-info><i class="fa fa-shopping-cart"> Add To Cart</i></button>
						</div>
					</div>
				</form>	
			</div>
			<div class="col-lg-3">
				<form action="cart.php" method="POST">
					<div class="card">
						<img src="profile/board-plough.jpeg" class="card-img-top">
						<div class="card-body text-center">
							<h5 class="card-title">Board plough</h5>
							<p class="card-text">Price:Tsh6,000</p>
							<button type="submit" name="add" id="plus" class=btn btn-info><i class="fa fa-shopping-cart"> Add To Cart</i></button>
						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>

</body>
<script src ="kuka/js/jquery-3.4.1.slim.min.js"></script>
<script src="kuka/js/popper.min.js"></script>
<script  src ="kuka/js/bootstrap.min.js"></script>
<script>
	 $("#plus,#pls").click(function(){
	 	alert("YOU HAVE TO CREATE AN ACCOUNT FOR  THIS ACTION");
	 	});
</script>
</html>