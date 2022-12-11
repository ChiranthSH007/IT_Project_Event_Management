<?php
    
session_start ();
include("config.php"); 

if(isset($_REQUEST['register']))
{
$a = $_REQUEST['uemail'];
$b = $_REQUEST['upassword'];
$c = $_REQUEST['uname'];
$d = $_REQUEST['upno'];
$sql="INSERT INTO users (user_name,user_email,user_pno,user_password) VALUES ('$c','$a','$d','$b')";
if(mysqli_query($conn,$sql))
{
	header("location:login_reg_page.php");
}
else	
{
	echo "errorRegistering";
}
}

?>