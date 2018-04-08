<?php
$con=mysqli_connect("localhost","root","","intern",3306) or die("Server not found");
mysqli_select_db($con,"intern") or die("database not found!");
?>