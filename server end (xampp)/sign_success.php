
<?php

$con=mysqli_connect('localhost','root','');
 if(!$con)
 {
	 echo "not con";
	 
 }
 if(!mysqli_select_db($con,'db1'))
 {
	 echo "database";
 }
    $FIRST_NAME = $_POST['FIRST_NAME'];
	$LAST_NAME = $_POST['LAST_NAME'];
	$MOBILE_NUMBER = $_POST['MOBILE_NUMBER'];
	$CITY = $_POST['CITY'];
	$Email = $_POST['Email'];
    $Password = $_POST['Password'];
$sql= "INSERT INTO user1 (FIRST_NAME,LAST_NAME,MOBILE_NUMBER,CITY,Email,Password) VALUES ('$FIRST_NAME','$LAST_NAME','$MOBILE_NUMBER','$CITY','$Email','$Password')";
 
$link_address='trial.php';
 
 
 if(!mysqli_query($con,$sql))
 {
	 echo " not registered";
 }
 else{
	 echo "registered you details";
	 echo "<a href='".$link_address."'> Click here to return to main page</a>";
 }
 
 ?>
