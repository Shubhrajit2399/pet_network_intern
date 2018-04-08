<?php
include("database.php");
session_start();
$login=$_SESSION["usrid"];

$stat=$_SESSION["cstat"];
$msg1="";
if ($stat == 'N') {
	$i="update login set statuss='Y' where login_id='$login'";
	$q=mysqli_query($con,$i);
		//header("location:profile1.php");
	$cl="select count(statuss) as like_cnt from login where statuss ='Y' ";
	$d=mysqli_query($con,$cl);
	$r1=mysqli_fetch_assoc($d);
	$r11=$r1["like_cnt"];
	$ulc="update post set like_count='$r11'";
	$d1=mysqli_query($con,$ulc);

	$clll="select count(statuss) as unlk_cnt from login where statuss ='N' ";
	$dll=mysqli_query($con,$clll);
	$r3=mysqli_fetch_assoc($dll);
	$r222=$r3["unlk_cnt"];
	$uulcc="update post set dislike_count='$r222'";
	$dl11=mysqli_query($con,$uulcc);

	header("location:profile1.php");	
}
else{
	$t="update login set statuss='N' where login_id='$login'";
	$r=mysqli_query($con,$t);
		//header("location:profile1.php");
	$cll="select count(statuss) as unlike_cnt from login where statuss ='N' ";
	$dl=mysqli_query($con,$cll);
	$r2=mysqli_fetch_assoc($dl);
	$r22=$r2["unlike_cnt"];
	$uulc="update post set dislike_count='$r22'";
	$dl1=mysqli_query($con,$uulc);

	$v="select count(statuss) as lik from login where statuss ='Y' ";
	$u=mysqli_query($con,$v);
	$w=mysqli_fetch_assoc($u);
	$x=$w["lik"];
	$a="update post set like_count='$x'";
	$z=mysqli_query($con,$a);

	header("location:profile1.php");
}
?>