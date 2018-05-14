<?php
	$objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	
	$groupcode = $_POST["groupcode"];
	
	$sql = "UPDATE groupinfo SET completed=1 WHERE groupcode='$groupcode'";
	$objQuery = mysqli_query($objConnect, $sql)
	if(!objQuery)	{
		$arr['StatusID'] = "0"; 
		$arr['Error'] = mysqli_error($objConnect);	
		$arr['groupcode'] = $groupcode;
	} else {
		$arr['success'] = true;
	}
	
	mysqli_close($objConnect);
	
	echo json_encode($arr);
	
?>