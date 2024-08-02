<?php
 



   $conn=mysqli_connect("localhost","root","","agriculture");
  if(isset($_GET["DELETE"])){
       $nationid=$_GET["DELETE"];
       $query = "DELETE FROM user WHERE nationid =$nationid";
       $del = mysqli_query($conn,$query);

  header("location:vendorlist.php");
}
?>