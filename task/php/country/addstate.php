<?php
		include("dbcon.php");
	$cname=$_POST['cname'];
	$sname=$_POST['sname'];


	$query="INSERT INTO `state`(`cid`, `sname`) VALUES ('$cname','$sname')";


	$query_exe=mysqli_query($con,$query);
	if ($query_exe){
		echo 1;
		}
	else {
		echo 0;
	}

?>
