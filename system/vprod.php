<?php
session_start();
if (!isset($_SESSION['fname'])) {
   header("location:signup.php");
 } else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>PRODUCTS</title>
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
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
		background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url("profile/getty.jpg");
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
	table{
		width:890px;
		height:200px;
		margin-left: 150px;
	}

</style>
<body>
	<nav class="navbar navbar-expand-lg navbar-light">
		<i class="fa fa-tachometer fa-lg fa-fw" aria-hidden="true" style="color:blue;"></i>
		<a class="navbar-brand" href="panel.php"><b class="text-light"><img src="profile/avatar.png" alt="Avatar" class="avatar"><?php echo  $_SESSION['fname']; ?> </b></a>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"></li>
			</ul>
			<a href="admin.php" class="btn btn-info" style="color:black; text-decoration: none;">BACK</a>
		</div>
	</nav>
	<a href="addprod.php?stock" class="m-3 mt-5 ml-5 btn btn-info" style="color:black; text-decoration: none;">ADD MORE PRODUCTS ON STOCK</a>
	<table style="border:2px solid #009688; float:center">
		<thead>
			<tr style="background-color:#009688;color:#FFDB58;text-align:center">
				<th>Prodname</th>
				<th>Price</th>
				<th>Remaining Units</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$conn =mysqli_connect("localhost","root" ,"","agriculture");

			$query = 'SELECT * FROM stock,product WHERE stock.product_id = product.product_id AND stock.quantity > 0';

			$run = mysqli_query($conn,$query);
			while ( $row = mysqli_fetch_array($run)){
				?>
				<tr>
					<td style="color: white;text-align:center;"><?php echo $row["product_name"]; ?></td>
					<td style="color: white;text-align:center;"><?php echo $row["price"]; ?></td>
					<td style="color: white; text-align:center;"><?php echo $row["quantity"]; ?></td>
					<td style="text-align:center"><img src="image/<?php echo $row["image"]; ?>" width="120px" height="90px"></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>
<?php }?>
