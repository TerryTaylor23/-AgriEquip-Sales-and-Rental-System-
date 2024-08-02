<?php
session_start();
$conn =mysqli_connect("localhost","root","","agriculture");
if (!isset($_SESSION['fname'])) {
	header("location:signup.php");
} else{ ?>

<!DOCTYPE html>
<html>
	<head>
		<title>ADD PRODUCT</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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

<?php
    //get data from addproduct form
	if(isset($_GET['prod'])){

		if(isset($_POST['addproduct'])){

			$productname =$_POST["productname"];
			$price = $_POST["price"];

			$file = $_FILES['image']['name'];
			$tempname = $_FILES['image']['tmp_name'];
			$folder = "image/";

			move_uploaded_file($tempname,$folder.$file);
			$sql="INSERT INTO product (product_id,product_name,price,image) VALUES (NULL, '$productname', '$price', '$file')";
			$res =mysqli_query($conn,$sql);

			if($res){
				move_uploaded_file($_FILES['image']['tmp_name'], $folder."/".$file);
				echo "<script>alert('product added successfully')</script>";
			}else{
				echo "<script>alert('failed to add new product')</script>";
			}
		}

		?>
		<div class="container">
			<div class="row justify-content-center pt-5">
				<div class="col-md-5">
					<div class="card" style="background-color:#009688;">
						<div class="card-header">
							<h3 class="text-center">ADD NEW PRODUCT</h3>
							<form class="my-5" method="POST" action="addprod.php?prod" enctype="multipart/form-data">
								<div class="form-group">
									<label>Product Name</label>
									<input type="text" name="productname" placeholder="Productname" class="form-control" required >
								</div>
								<div class="form-group">
									<label>Price</label>
									<input type="number" name="price" placeholder="Price" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Select Image</label>
									<input type="file" name="image" class="form-control-file" required>
								</div>
								<input type="submit" name="addproduct" id="up" value="ADD PRODUCT" class="btn btn-success my-3" >
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	//add data using stock form
	}elseif (isset($_GET['stock'])) {

		if(isset($_POST['addstock'])){

			$product =$_POST["product"];
			$quantity =$_POST["quantity"];
			if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM stock WHERE product_id = '$product'")) > 0) {

				$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM stock WHERE product_id = '$product'"));
				$newquantity = $row["quantity"] + $quantity;
				$addstock = mysqli_query($conn, "UPDATE `stock` SET `quantity` = '$newquantity' WHERE `stock`.`product_id` = '$product'");
			}else{

				$addstock = mysqli_query($conn, "INSERT INTO stock (product_id,quantity) VALUES ('$product','$quantity')");
			}

			if($addstock){
				echo "<script>alert('product added successfully')</script>";
			}else{
				echo "<script>alert('image failed to upload')</script>";
			}
			header("location:addprod.php?stock");
		}
		?>
		<div class="container">
			<div class="row justify-content-center pt-5">
				<div class="col-md-5">
					<div class="card" style="background-color:#009688;">
						<div class="card-header">
							<h3 class="text-center">ADD PRODUCT ON STOCK</h3>
							<form class="my-5" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label>Product Name</label>
									<select class="form-control" name="product">
										<option value="" hidden selected disabled>---Choose Product---</option>
										<?php
										$fetch_product = mysqli_query($conn, "SELECT * FROM product");
										foreach ($fetch_product as $row) {
											?>
											<option value="<?php echo $row['product_id'] ?>"><?php echo $row['product_name'] ?></option>
											<?php
									 	}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Quantity</label>
									<input type="number" name="quantity" placeholder="Quantity" class="form-control" required="">
								</div>
								<div class="form-group">
									<input type="submit" name="addstock" id="up" value="ADD STOCK" class="btn btn-success my-3" >
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>
	</body>
</html>

<?php } ?>



<script src ="kuka/js/jquery-3.4.1.slim.min.js"></script>
<script src="kuka/js/popper.min.js"></script>
<script  src ="kuka/js/bootstrap.min.js"></script>
<script>
$("#up").click(function(){
	alert("PRODUCT ADDED SUCCESSFULLY");
});
</script>
