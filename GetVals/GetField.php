<?php
	$objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	//$objDB = mysqli_select_db("userinformation1");
	
	$strMemberID = $_POST["id"];
	$field = $_POST["field"];
	$xd = mysql_query("SHOW COLUMNS FROM userinformation LIKE $field");
	$exists = (mysql_num_rows($xd))?TRUE:FALSE;
	if($exists) {
		$sql = "SELECT $field FROM userinformation WHERE user_id='$strMemberID'";
		$result = $objConnect->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$currentScore = $row[$field];
			}
		} else {
			echo "0 results";
		}
			
		$arr['newScore'] = $currentScore;
	} else {
		echo "nope";
	}
	
	mysqli_close($objConnect);
	
	echo json_encode($arr);
?>