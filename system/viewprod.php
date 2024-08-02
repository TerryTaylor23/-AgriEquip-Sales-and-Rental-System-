<?php
session_start();
if (!isset($_SESSION['fname'])) {
	header("location:signup.php");

 } else{
	if (isset($_POST["add_to_cart"])) {
		if (isset($_SESSION["cart"])) {

			$item_id = array_column($_SESSION["cart"], "item_id");

			if (in_array($_POST["id"], $item_id)) {
				echo "<script>alert('Item Already added on Cart')</script>";
				header("locaion:viewprod.php");
			}else {
				$count = count($_SESSION["cart"]);
				$items = array(
					'item_id' => $_POST["id"],
					'item_name' => $_POST["name"],
					'item_image' => $_POST["image"],
					'item_price' => $_POST["price"]
				);
				$_SESSION["cart"][$count] = $items;
			}
	 	}else{

			$items = array(
				'item_id' => $_POST["id"],
				'item_name' => $_POST["name"],
				'item_image' => $_POST["image"],
				'item_price' => $_POST["price"]
			);
			$_SESSION["cart"][0] = $items;
		}
	 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>PRODUCTS</title>
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="icon" type="image/jpg" href="profile/lg.jpg">
</head>
<style type="text/css">
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
body{
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
button:hover{
	color:#F68B1E;
	background-color:#F68B1E;
}

</style>
<body>
	<!--<form action="addprod.php" method="POST" enctype="multipart/form-data">-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<i class="fa fa-tachometer fa-lg fa-fw" aria-hidden="true" style="color:blue;"></i>
		<a class="navbar-brand" href="user.php"><b class="text-dark"><img src="profile/profile0.png" alt="Avatar" class="avatar"><?php echo  $_SESSION['fname']; ?> <?php echo $_SESSION['lnm']; ?></b></a>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"></li>
				
			</ul>
			<a href="cart.php" class="mr-5 btn btn-outline-success">My Cart(<?php if (isset($_SESSION["cart"])){echo count($_SESSION["cart"]);} else{ echo "0";} ?>)</a>
			<a href="user.php" class="btn btn-info" style="color:white; text-decoration: none;">BACK</a>
		</div>
	</nav>
	<div class="container pt-3">
		<h3 align="center" style="color: white;">PRODUCTS</h3>
		<div class="row">
			<?php
			$conn =mysqli_connect("localhost","root","","agriculture");

			$query = 'SELECT * FROM stock,product WHERE stock.product_id = product.product_id AND stock.quantity > 0';

			$run = mysqli_query($conn,$query);
			while ( $row = mysqli_fetch_array($run)){
				?>
				<div class="col-md-3 card">
					<form action="" method="POST" enctype="multipart/form-data">
						<img src="image/<?php echo $row["image"]; ?>" class="card-img-top img-responsive" height="200px">
						<div class="card-body text-center">
							<h4 class="text-info"><?php echo $row["product_name"]; ?></h4>
							<h4 class="text-info"><?php echo "Tsh".$row["price"]; ?></h4></br>
							<input type="hidden" name="name" value="<?php echo $row["product_name"]?>"/>
							<input type="hidden" name="id" value="<?php echo $row["product_id"]?>"/>
							<input type="hidden" name="image" value="<?php echo $row["image"]?>"/>
							<input type="hidden" name="price" value="<?php echo $row["price"]?>"/>
							<input type="submit" name="add_to_cart" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
						</div>
					</form>
				</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>
<?php }?>
