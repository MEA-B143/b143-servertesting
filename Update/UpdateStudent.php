<?php
include 'DatabaseConfig.php';
define('HOST','den1.mysql5.gear.host');
define('USER','userinformation1');
define('PASS','Ox750!N-4Omp');
define('DB','userinformation1');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
echo "Connected";
if($_SERVER['REQUEST_METHOD']=='POST'){
	$id = $_POST['StudentID'];
	$change = $_POST['scoreChange'];
	echo $id . $change;
	$change = (int)$change;
	$sql2 = "SELECT score FROM userinformation WHERE id = $id";
	$query = mysqli_query($con, $sql2);
	while ($row = $query->fetch_row()) {
		$currentScore = (int)$row[0];
	}
	$newscore = $currentScore+$change;
	$newscoreString = strval($newscore);
	echo $newscoreString;
	$Sql_Query = "UPDATE userinformation SET score='$newscoreString' WHERE id = '$id'";

	if(mysqli_query($con,$Sql_Query)) {
		echo $newscore;
	}
	else {
		echo mysqli_error($con);
	}
}
mysqli_close($con);
?>