<?php


 $fname=$_POST["fname"];
 $lname=$_POST["lname"];
 $gender=$_POST["sex"];
 $nationid=$_POST["nationid"];
 $phonenumber=$_POST["mobile"];
 $psword=sha1($_POST["pass"]);

 
 //establishing connection to the database
 $sql=mysqli_connect("127.0.0.1","root","","agriculture");
 //prepare the query you want to run
 $query="insert  into user(firstname,lastname,sex,nationid,phonenumber,password)
  values('$fname','$lname','$gender','$nationid','$phonenumber','$psword')";
  //running
  $query1=mysqli_query($sql,$query);   
 
  if ($query1) {
  	  
      
    	echo "Registration Complete!";
      header("Location:signup.php");
      
    }  
     else{
     	die(mysqli_error($sql));
     }

?>