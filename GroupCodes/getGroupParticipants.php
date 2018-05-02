<?php
    $objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	
	$groupCode = $_POST["groupCode"];
	
	$sql = "SELECT username, score FROM userinformation WHERE groupcode='$groupCode'";
	$objQuery = mysqli_query($objConnect, $sql);
	if(!$objQuery) {
		$output['groupCode'] = $groupCode; 
		$output['Error'] = mysqli_error($objConnect);	
	} else {
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$output[$row["username"]] = $row["score"]; //combining usernames and scores of participants to output
			}
		} else{
			echo "No Result";
			$output['groupCode'] = $groupCode;
			
		}
	}
	
	mysqli_close($objConnect);
	
	echo json_encode($output);