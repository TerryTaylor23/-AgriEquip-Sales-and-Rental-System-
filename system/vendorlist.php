<!DOCTYPE html>
<html>
<head>
	<title>USERS</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
	<link href="css/popup_style.css" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="profile/lg.jpg">
</head>
<style type="text/css">
		body{
			background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url("profile/getty.jpg");
		    background-size: cover;
		    background-repeat: no-repeat;
		    min-height: 100vh;
		    background-position: center;
		}
		table{
			width:890px;
			height:200px;
			margin-left: 150px;
		}
	</style>
<body>
	<h2 style="background-color:#009688; color:white; text-align:center; font-size:56px">
         VENDORS
     </h2>
     <a href="view.php" class="btn btn-info">BACK</a>
     <?php
         $con = mysqli_connect("localhost","root","","agriculture");
        $sql1 = "SELECT * FROM user WHERE user_type = 'vendor'";
         $query1 = mysqli_query($con,$sql1);
     if (!$query1){
	    die (mysqli_error($con));
          }

         $ret = mysqli_num_rows($query1);
        if ($ret == 0){
	    echo "no users!";
         }
         else
         {
	 ?>
	 <table style="border:2px solid #009688; float:center">
	 <tr style="background-color:#009688;color:#FFDB58;text-align:center">
	 <th>Firstname</th><th>lastname</th><th>Gender</th><th>Phonenumber</th><th>Action</th>
	 </tr>
	 <?php
	 while ($result = mysqli_fetch_array($query1)){
		$fname= $result["firstname"];
        $lname= $result["lastname"];
        $gender=$result["sex"];
        $phonenumber= $result["phonenumber"];
		?>

		<tr><td style="color: white;text-align:center"><?php echo $fname; ?></td>
			<td style="color: white;text-align:center"><?php echo $lname; ?></td>
		<td style="color: white;text-align:center"><?php echo $gender; ?></td>
		<td style="color: white;text-align:center"><?php echo $phonenumber; ?></td>
		<td style="color: white;text-align:center"><a href="delete.php?DELETE=<?php echo $result['nationid']; ?>"  class="btn btn-info"><i class="fas fa-trash"  id="del">DELETE</i></a></td>
		</tr>
		<?php
	}
	?>
	</table>
	<?php
}

?>
 <script src ="kuka/js/jquery-3.4.1.slim.min.js"></script>
<script src="kuka/js/popper.min.js"></script>
<script  src ="kuka/js/bootstrap.min.js"></script>
<script>
 $("#del").click(function(){
 	alert("DELETED SUCCESSFULLY");
 })
</script>>
</body>
</html>
