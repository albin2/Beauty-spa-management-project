<?php
		include("dbcon.php");
	$cname=$_POST['cname'];
	$sname=$_POST['sname'];
	$dname=$_POST['dname'];


	$query="INSERT INTO `district`( `sid`, `dname`) VALUES ('$sname','$dname')";


	$query_exe=mysqli_query($con,$query);
	if ($query_exe){
		echo 1;
		}
	else {
		echo 0;
	}

?>
