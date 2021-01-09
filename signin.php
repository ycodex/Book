<?php
include_once 'utils/db_connection.php';
ob_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['pass'];


$q3=mysqli_query($con,"INSERT INTO usertable VALUES  ('$email' ,'$name','$password')");
if($q3)
{
session_start();
$_SESSION["email"] = $email;
$_SESSION["name"] = $name;

 
echo '<script> alert("Account created successfully! Login now."); </script>'; 

header("location:logon.php");
}
else
{
echo '<script type="text/JavaScript"> alert("An Error Occured, Try Again!");</script>';
header("location:index.html");
}
ob_end_flush();
?>