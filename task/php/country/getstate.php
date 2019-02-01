<?php
include("dbcon.php");
$cid=$_POST['cid'];

	$query="SELECT * FROM state where cid='$cid'";
	$query_exe=mysqli_query($con,$query);
	$sid=array();
	$sname=array();
	$len=0;

	if($query_exe){
		while($resultset=mysqli_fetch_assoc($query_exe)){
				$len++;
				$sid[$len]=$resultset['sid'];
				$sname[$len]=$resultset['sname'];
			}
	}
if ($len==0)
{
	echo "false";
}
else {
	$json="{ \"size\":\"".$len."\",\"admno\" : [";
	for($i=1;$i<=$len;$i++){

		if($i>=2)
			$json=$json.",";
		$json=$json."{
						\"sid\":\"".$sid[$i]."\",
						\"sname\":\"".$sname[$i]."\"

						}" ;
	}
	$json=$json.']}';



	echo $json;

}



?>
