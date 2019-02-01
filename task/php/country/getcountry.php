<?php
include("dbcon.php");

	$query="SELECT * FROM country";
	$query_exe=mysqli_query($con,$query);
	$cid=array();
	$cname=array();
	$len=0;

	if($query_exe){
		while($resultset=mysqli_fetch_assoc($query_exe)){
				$len++;
				$cid[$len]=$resultset['cid'];
				$cname[$len]=$resultset['cname'];
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
						\"cid\":\"".$cid[$i]."\",
						\"cname\":\"".$cname[$i]."\"

						}" ;
	}
	$json=$json.']}';



	echo $json;

}



?>
