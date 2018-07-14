<?php
session_start();
	
$Email =$_POST['Email'];
$Password = $_POST['Password'];


$con=mysqli_connect('localhost','root','');
 if(!$con)
 {
	 echo "not con";
	 
 }
 if(!mysqli_select_db($con,'db1'))
 {
	 echo "database";
 }

$query = "SELECT * FROM user1 WHERE Email ='$Email' AND Password ='$Password'";
$result = mysqli_query($con,$query) or die(mysql_error());

  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$link_address = 'signup.php';
$link_address1 = 'login.php';

if($row['Email'] == $Email && $row['Password']== $Password){
	 echo "login success!! ";
	 } else {
		 echo nl2br(" Invalid email or password!!<a href='".$link_address1."'> Try Again</a>\n\n Dont't have an account<a href='".$link_address."'> Click here to register</a>");
		 
}	
	
?>



