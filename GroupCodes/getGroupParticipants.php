<?php
    $objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	
	$strMemberID = $_POST["id"];
	$groupCode = $_POST["groupCode"];
	
	$sql = "SELECT groupcode FROM userinformation WHERE groupcode = '$groupCode'";
	$result = $objConnect->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$output[$row["username"]] = $row["score"]; //combining usernames and scores of participants to output
		}
	} else{
		echo "No Result";
	}
	
	
	mysqli_close($objConnect);
	
	echo json_encode($output);