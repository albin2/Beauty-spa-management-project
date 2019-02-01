<?php
		include("dbcon.php");
	$cname=$_POST['cname'];


	$query="INSERT INTO `country`( `cname`) VALUES ('$cname')";


	$query_exe=mysqli_query($con,$query);
	if ($query_exe){
		echo 1;
		}
	else {
		echo 0;
	}

?>
