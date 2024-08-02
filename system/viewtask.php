<?php
session_start();
if (!isset($_SESSION['fname'])) {
   header("location:signup.php");
 } else{}
	 $conn =mysqli_connect("localhost","root" ,"","agriculture");
	 if (isset($_POST["vendor"])) {
	 	// code...
		$selected_vendor = $_POST["vendor"];
		$selected_customer = $_POST["customer"];
		mysqli_query($conn, "UPDATE `TBL_order` SET `vendor` = '$selected_vendor' WHERE `TBL_order`.`customer_id` = '$selected_customer';");
	 }
	 //if user cliks the verify button
	 if (isset($_POST["verification"])) {
	 	// code...
		$verification_code = $_POST["code"];
		$customer = $_POST["customer_id"];
		$query1 = "SELECT * FROM TBL_order,product,user WHERE TBL_order.customer_id = user.nationid AND TBL_order.product_id = product.product_id AND TBL_order.code = '$verification_code' AND TBL_order.customer_id = '$customer'  AND TBL_order.vendor = '".$_SESSION['nationid']."'";

		//retrive the code from database
		$verification = mysqli_fetch_assoc(mysqli_query($conn, $query1));
		//compare the verification codes
		if ($verification_code === $verification["code"]) {
			// code...
			mysqli_query($conn, "UPDATE `TBL_order` SET `status` = 'delivered' WHERE TBL_order.code = '$verification_code' AND TBL_order.customer_id = '$customer' AND TBL_order.vendor = '".$_SESSION['nationid']."'");
			?><script>alert("delivery task complete")</script>
			<script>window.location = "viewtask.php"</script><?php
		}else{
			?><script>alert("Verification code incorrect")</script>
			<script>window.location = "viewtask.php"</script><?php		}
	 }
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
<nav class="navbar navbar-expand-lg navbar-light">
	<i class="fa fa-tachometer fa-lg fa-fw" aria-hidden="true" style="color:blue;"></i>
	<a class="navbar-brand" href="panel.php"><b class="text-light"><img src="profile/avatar.png" alt="Avatar" class="avatar"><?php echo  $_SESSION['fname']; ?> </b></a>
	<div class="collapse navbar-collapse" id="navbarText">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active"></li>
		</ul>
		<a href="vendor.php" class="btn btn-info" style="color:black; text-decoration: none;">BACK</a>
	</div>
</nav>
<table style="border:2px solid #009688; float:center">
	<thead>
		<tr style="background-color:#009688;color:#FFDB58;text-align:center">
			<th colspan="2">Custumer</th>
			<th>Verification code</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php

		$query = "SELECT * FROM TBL_order,product,user WHERE TBL_order.customer_id = user.nationid AND TBL_order.product_id = product.product_id AND TBL_order.status != 'delivered' AND TBL_order.vendor = '".$_SESSION['nationid']."' GROUP BY TBL_order.customer_id";
		$i = 1;

		$run = mysqli_query($conn,$query);
		foreach ($run as $row) {
			// code...
			?>
			<tr class="bg-gray">
				<td colspan="2"><?php echo $row["firstname"]." ".$row["lastname"]; ?></td>
				<td>
					<form method="post">
						<div class="row">
							<div class="col-8">
								<input class="form-control" type="number" name="code" value="" required placeholder="Enter the 6 digit verification code">
							</div>
							<div class="col-4">
								<input class="form-control" type="submit" name="verification"  value="verify">
								<input type="" name="customer_id" value="<?php echo $row['customer_id'] ?>" hidden>
							</div>
						</div>
					</form>
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
						$query1 = "SELECT * FROM TBL_order,product,user WHERE TBL_order.customer_id = user.nationid AND TBL_order.product_id = product.product_id AND TBL_order.status != 'delivered' AND user.nationid = '$user_id' AND TBL_order.vendor = '".$_SESSION['nationid']."'";

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
<?php ?>


<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="bootstrap/js/bootstrap4-toggle.min.js"></script>
