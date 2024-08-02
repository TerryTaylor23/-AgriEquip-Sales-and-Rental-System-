<?php
session_start();
$conn =mysqli_connect("localhost","root","","agriculture");
if (!isset($_SESSION['fname'])) {
   header("location:signup.php");
} else{
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
	<link rel="icon" type="image/jpg" href="profile/lg.jpg">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center border rounded bg-light my-5" >
				<h1>MY CART</h1>
               <a href="viewprod.php"><button type="button" class="btn btn-info" style="border-radius:2px;">CONTINUE TO ORDER</button></a>
             </div>
			</div>
			    <div class="col-lg-8">
			    <?php
                  $con = mysqli_connect("localhost","root","","agriculture");
                  $sql1 = "SELECT * FROM stock";
                  $query1 = mysqli_query($con,$sql1);
                      if (!$query1)
                      {
	                   die (mysqli_error($con));
                      }
                      $ret = mysqli_num_rows($query1);
                      if ($ret == 0)
                      {
	                  echo "no products!";
                      }else{};
	            ?>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Item Image</th>
							<th scope="col">Item Name</th>
							<th scope="col">Quantity</th>
							<th  scope="col">Total Price</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (!empty($_SESSION["cart"])) {
							// code...
							$total = 0;
							foreach ($_SESSION["cart"] as $row) {
								// code...
								$item_id = $row['item_id'];
								if (!isset($_SESSION["quantity$item_id"])) {
									// code...
									$_SESSION["quantity$item_id"] = 1;
								}
								?>
								<tr>
									<td><img src="image/<?php echo $row["item_image"]; ?>" width="70px"></td>
									<td><?php echo $row["item_name"]; ?></td>
									<td>
										<form method="post" action="action.php?quantity=<?php echo $item_id; ?>">
											<select name="quantity" onchange="this.form.submit()">
												<?php
												$getquantity = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM stock WHERE product_id = $item_id"));

												?>
												<option hidden selected value="<?php echo $_SESSION["quantity$item_id"] ?>"><?php echo $_SESSION["quantity$item_id"] ?></option>
												<?php
												for ($i=1; $i <= $getquantity["quantity"]; $i++) {
													// code...
													?>
													<option value="<?php echo $i ?>"><?php echo $i ?></option>
													<?php
												}
												?>
											</select>
										</form>
									</td>
									<td>
										<?php
										echo "Tsh".($row["item_price"] * $_SESSION["quantity$item_id"]);
										?>
									</td>
									<td style="color: white;text-align:center"><a href="action.php?DELETE=<?php echo $item_id; ?>"  class="btn btn-outline-danger"><i class="fas fa-trash"  id="del">REMOVE</i></a></td>
								</tr>
							<?php
								$total = $total + ($row["item_price"] * $_SESSION["quantity$item_id"]);
							} ?>
								<tr>
									<td colspan="4" class="text-right">Total</td>
									<td><?php echo "Tsh".$total; ?></td>
								</tr>
								<a href="action.php?order" class="btn btn-outline-info mb-3">Make Order</a>
						<?php
						}else{
							echo "Your cart is empty!!";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>
<?php } ?>
