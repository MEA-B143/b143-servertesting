<?php
    $objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	
	$id = $_POST["id"];
	$groupCode = $_POST["groupCode"];
	//$intID = (int)$id;

	
	$sql = "SELECT * FROM userinformation WHERE groupcode='".$groupCode."' ORDER BY score DESC";
	$objQuery = mysqli_query($objConnect, $sql);
	if(!$objQuery) {
		$output['groupCode'] = $groupCode; 
		$output['Error'] = mysqli_error($objConnect);	
	} else {
		if ($objQuery->num_rows > 0) {
			// output data of each row
			while($row = $objQuery->fetch_assoc()) {
				$output[$row["username"]] = $row["score"]; //combining usernames and scores of participants to output
			}
		} else{
			echo "No Result";
			$output['groupCode'] = $groupCode;
			$output['sql'] = $sql;
		}
	}
	
	mysqli_close($objConnect);
	
	echo json_encode($output);