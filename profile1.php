<?php
include("database.php");
session_start();
if (! empty ($_SESSION["ss_nm"])){
	$uid=$_SESSION["ss_id"];
	$_SESSION["usrid"]=$uid;
	$name=$_SESSION["ss_nm"];
}
else{
	header("location:index1.php");
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sellers Login</title>
  
  
  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<div class="container"><center><br><br><hr>
		
		<?php
		$s="select name, statuss from login where login_id='$uid'";
		$q=mysqli_query($con,$s);
		$row9= mysqli_fetch_assoc($q);
		$stat=$row9["statuss"];
		$_SESSION["cstat"]=$stat;
		echo "<h2>Hello ".$name."</h2><br>";
		
					if ($stat == 'N') {
						$x="select post.dislikes from post,login where login.login_id='$uid'";
						$y=mysqli_query($con,$x);
						$z=mysqli_fetch_assoc($y);
						echo "<p>".$z["dislikes"]."</p><hr>";
			?><a href="hit_submit.php"><button style="font-size:24px" >Button <i class="fa fa-thumbs-o-up" style="color:blue;"></i></button></a>
			<?php
			}
			else{
						$n="select post.like_count, post.dislike_count from post,login where login.login_id='$uid'";
						$m=mysqli_query($con,$n);
						$o=mysqli_fetch_assoc($m);
						echo "<p>No of people liked:".$o["like_count"]." "."||||||"." "."No of people doesn't liked:".$o["dislike_count"]."</p><hr>";
						
			?><a href="hit_submit.php"><button style="font-size:24px">Button <i class="fa fa-thumbs-o-down" style="color:blue;"></i></button></a>
			<?php
		}
		?>
		<br><br><hr>
		<a href="logout.php"><button style="font-size:24px">Logout</button></a>
	</center></div>
	
</body>

</html>
