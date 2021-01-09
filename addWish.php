<?php
include_once 'utils/db_connection.php';
session_start();
if(!(isset($_SESSION['email']))){
	header("location:index.html");

	}
else
    {
    $name = $_SESSION['name'];
    $email=$_SESSION['email'];

    }
				
	
    
$email=$_SESSION['email'];
$book = $_POST['book'];
$name =$_POST['name'];


$q3=mysqli_query($con,"INSERT INTO wishlist VALUES  ('$email' , '$book','$name')") or die(mysqli_error($con));

if($q3)
{
echo '<script language="javascript"> alert("Added Successfully");</script>';
header("location:wishlist.php");

}
else
{
echo '<script type="text/JavaScript"> alert("An Error Occured, Try Again!");</script>';
// header("location:display.php");
}
// ob_end_flush();
?>