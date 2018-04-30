<?php
    $objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	

	$strMemberID = $_POST["id"];
	
	$sql = "SELECT groupcode FROM userinformation";
	$result = $objConnect->query($sql);
	$exists = true;
	
	// Continue generating new group IDs until one is generated that doesn't already exist
	while ($exists == true) {
		$newgroupcode = rand(10000, 99999);
		if ($result->num_rows > 0) {
			// output data of each row
			$switch = false;
			while($row = $result->fetch_assoc()) {
				if ($row["groupcode"] == $newgroupcode) {
					// Check if the randomly generated group code exists
					$switch = true;
					break;
				}
			}
			if (switch == false) {
				$exists = false;
			}
		} else {
			$exists = false;
		}
	}
	
	$strSQL = "UPDATE userinformation SET groupcode=$newgroupcode WHERE user_id='$strMemberID'";
	$objQuery = mysqli_query($objConnect, $strSQL);
	if(!$objQuery) {
		echo "error";
	}
	else {
		echo $newgroupcode;
	}
	mysqli_close($con);
?>