
<?php
session_start();
if(isset($_SESSION["email"])){
session_destroy();
}
include_once 'utils/db_connection.php';
// $ref=@$_GET['q'];
$email = $_POST['email'];
$password = $_POST['pass'];


$result = mysqli_query($con,"SELECT name FROM usertable WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
}
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
header("location:display.php");
}
else
echo '<script language="javascript"> alert("An Error Occured, Try Again!");</script>';


?>