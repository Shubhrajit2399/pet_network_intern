<?php
include("database.php");
$name=$_POST["nm"];
$pswd=$_POST["paswrd"];

$s="select login_id,name from login where BINARY name=BINARY '$name' and BINARY paswrd=BINARY '$pswd'";
$i=mysqli_query($con,$s);
if($row=mysqli_fetch_assoc($i)){
	session_start();

	$_SESSION["ss_id"]=$row["login_id"];
	$_SESSION["ss_nm"]=$row["name"];

	echo "<script>window.location='profile1.php'</script>";
}
else{
	echo "<script>alert('Invalid Input. Please try again.'),window.location='index1.php';</script>";
}
?>