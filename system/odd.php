<?php
session_start();
if (!isset($_SESSION['fname'])) {
   header("location:signup.php");
 } else{
	 $conn =mysqli_connect("localhost","root" ,"","agriculture");

?>

<!DOCTYPE html>
<html>
<head>
	<title>PRODUCTS</title>
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap4-toggle.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
			<a href="user.php" class="btn btn-info" style="color:black; text-decoration: none;">BACK</a>
		</div>
	</nav>
	<table style="border:2px solid #009688; float:center">
		<thead>
			<tr style="background-color:#009688;color:#FFDB58;text-align:center">
				<th>Verification code</th>
				<th colspan="2">Vendor</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$query = "SELECT * FROM TBL_order,product,user WHERE TBL_order.customer_id = user.nationid AND TBL_order.product_id = product.product_id AND user.nationid = '".$_SESSION['nationid']."' GROUP BY TBL_order.customer_id";
			$i = 1;

			$run = mysqli_query($conn,$query);
			foreach ($run as $row) {
				// code...
				?>

				<tr class="bg-gray">
					<td style="color: white;text-align:center;" class="font-weight-bolder">
						<?php if(isset($row["code"])){
							echo $row["code"];
						}
						    else{
						    	echo "you will be provided with the code soon";
						    };
					    ?>
					</td>
					<td colspan="2">
						<?php
						if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM TBL_order,user WHERE TBL_order.vendor = user.nationid AND vendor != '' AND customer_id = ".$row['customer_id'])) > 0) {
							// code...
							$vendor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM TBL_order,user WHERE TBL_order.vendor = user.nationid AND TBL_order.customer_id = '".$row['customer_id']."'"));
							echo "<div class='h5'>order assigned to ".$vendor["firstname"]." ".$vendor["lastname"]."</div>";
						}else{
							echo "<div class='h5'>order pending.....</div>";
						}
						?>
					</td>
					<td class="panel-group text-center">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" href="#collapse<?php echo $i; ?>" class="collapsed btn btn-info"><i class="fa fa-chevron-down"> View Products</i></a>
								</h4>
							</div>
						</div>
					</td>
				</tr>
				<tr id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
					<div class="panel-body">
						<thead id="collapse<?php echo $i; ?>" class="collapse">
							<tr style="background-color:#009688;color:#FFDB58;text-align:center">
								<th>Prodname</th>
								<th>Quantity</th>
								<th>Total Price</th>
								<th>Image</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$user_id = $row["nationid"];
							$query1 = "SELECT * FROM TBL_order,product,user WHERE TBL_order.customer_id = user.nationid AND TBL_order.product_id = product.product_id AND TBL_order.status != 'delivered' AND user.nationid = '$user_id'";

							$run = mysqli_query($conn,$query1);
							foreach ($run as $row1) {
								?>
								<tr id="collapse<?php echo $i; ?>" class="collapse">
									<td style="color: white;text-align:center;"><?php echo $row1["product_name"]; ?></td>
									<td style="color: white; text-align:center;"><?php echo $row1["quantity"]; ?></td>
									<td style="color: white;text-align:center;"><?php echo "Tsh ".$row1["price"]*$row1["quantity"]; ?></td>
									<td style="text-align:center"><img src="image/<?php echo $row1["image"]; ?>" width="120px" height="90px"></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</div>
				</tr><br>
				<?php
				$i++ ;
			}
			?>
		</tbody>
	</table>
</body>
</html>
<?php }?>

<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
