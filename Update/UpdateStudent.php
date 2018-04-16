<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

	include 'DatabaseConfig.php';
	$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
	$id = $_POST['StudentID'];
	$change = $_POST['scoreChange'];
	$change = (int)$change;
	$sql2 = "SELECT score FROM userinformation WHERE id = $id";
	$query = mysqli_query($con, $sql2);
	while ($row = $query->fetch_row()) {
		$currentScore = (int)$row[0];
	}
	$newscore = $currentScore+$change;
	$newscoreString = strval($newscore);
	echo $newscoreString;
	$Sql_Query = "UPDATE userinformation SET score=$newscoreString WHERE id = $id";

	if(mysqli_query($con,$Sql_Query)) {
		echo $newscore;
	}
	else {
		echo mysql_error();
	}
}
mysqli_close($con);
?>