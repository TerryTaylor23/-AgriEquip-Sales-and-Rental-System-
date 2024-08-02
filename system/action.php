<?php

session_start();
$conn=mysqli_connect("localhost","root","","agriculture");
//delete action 
if(isset($_GET["DELETE"])){
	// code...
	foreach ($_SESSION["cart"] as $key => $value) {
		// code...
		$id = $_GET["DELETE"];
		if($value["item_id"] == $id){
			// code...
			unset($_SESSION["quantity$id"]);
			unset($_SESSION["cart"][$key]);
			header("location:cart.php");
		}
	}
}


//
if (isset($_GET['quantity'])) {
	// code...
	$id = $_GET['quantity'];
	$_SESSION["quantity$id"] = $_POST['quantity'];

	header("location:cart.php");
}
//from add vendor form
if (isset($_GET['advendor'])) {
  // code...
	$first=$_POST['name'];
	$last=$_POST['sname'];
	$gender=$_POST["sex"];
	$nationid=$_POST["nationid"];
    $phonenumber=$_POST["pn"];
    $psword=sha1($_POST["ps"]);
    $roles=$_POST['role'];
	
	$query="insert  into user(firstname,lastname,sex,nationid,phonenumber,password,user_type)
    values('$first','$last','$gender','$nationid','$phonenumber','$psword','$roles')";
    //running
    $query1=mysqli_query($conn,$query); 
    if ($query1) {
  	  
      
    	echo "<script>alert('Vendor Added Successfully')</script>";
      header("Location:adv.php");
      
    }  
     else{
     	die(mysqli_error($sql));
     }  
}

//from make order form
if (isset($_GET["order"])) {
	// code...
	foreach ($_SESSION["cart"] as $key => $row) {
		// code...
		$item_id = $row['item_id'];
		$customer = $_SESSION['nationid'];
		$quantity = $_SESSION["quantity$item_id"];

		$getquantity = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `stock` WHERE `product_id` = '$item_id'"));
		$quantity = $getquantity["quantity"] - $quantity;
		mysqli_query($conn, "UPDATE `stock` SET `quantity` = '$quantity' WHERE `stock`.`product_id` = '$item_id'");

		$quantity = $_SESSION["quantity$item_id"];
		if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `TBL_order` WHERE `product_id` =  '$item_id' AND `customer_id` = '$customer' AND `status` = 'pending'")) > 0) {
			// code...
			$res = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `TBL_order` WHERE `product_id` =  '$item_id' AND `customer_id` = '$customer'"));
			echo $quantity."<br>".$res['quantity']."<br>";
			$quantity = $quantity + $res['quantity'];
			mysqli_query($conn, "UPDATE `TBL_order` SET `quantity` = '$quantity' WHERE `customer_id` = '$customer' AND `product_id` =  '$item_id'");
			echo "done";
		}else{
			// code...
			mysqli_query($conn, "INSERT INTO `TBL_order` (`customer_id`, `product_id`, `quantity`) VALUES ('$customer', '$item_id', '$quantity')");
			echo "not done";
		}

		unset($_SESSION["quantity$item_id"]);
		unset($_SESSION["cart"][$key]);

		echo "<script>alert('Order Complete')</script>";
		header("location:cart.php");
	}
}

?>
