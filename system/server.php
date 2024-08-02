<?php
$conn=mysqli_connect("localhost","root","","agriculture");

if($_POST['submit'])
{
	$nationid=$_POST["nationid"];
	$psword=sha1($_POST["pass"]);


	$sql =mysqli_query($conn,"SELECT * from user WHERE nationid='$nationid' and password ='$psword';");

	$result =mysqli_num_rows($sql);
	$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

	if($result == 1)
	{
		session_start();
		$_SESSION['fname'] = $row['firstname'];
		$_SESSION['lnm'] = $row['lastname'];
		$_SESSION['nationid'] = $row['nationid'];
		if ($row["user_type"] == "user") {


			header("location:user.php");
		}else if($row["user_type"] == "admin")
		{
			header("location:admin.php");
		}else{
			header("location:vendor.php");
		}
	}else{
		header('location:signup.php?pass=1');
	}
}
?>
