<?php
    $objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	
	//date_default_timezone_set('Europe/Copenhagen');

	$strMemberID = $_POST["id"];
	$name = $_POST["name"];
	$daylimit = (int)$_POST["daylimit"];
	$playerlimit = (int)$_POST["playerlimit"];
	date_default_timezone_set('Europe/Copenhagen');
	$date = date('Y-m-d H:i:s');
	
	$sql = "SELECT groupcode FROM userinformation";
	$result = $objConnect->query($sql);
	if (!result) {
		echo "error: " . mysqli_error($objConnect);
	} else {
		//echo "success 1";
	}
	$exists = true;
	
	// Continue generating new group IDs until one is generated that doesn't already exist
	
	while ($exists == true) {
		$newgroupcode = rand(10000, 99999);
		if ($result->num_rows > 0) {
			// output data of each row
			$switch = false;
			while($row = $result->fetch_assoc()) {
				if ($row["groupcode"] == strval($newgroupcode)) {
					// Check if the randomly generated group code exists
					$switch = true;
					break;
				}
			}
			if ($switch == false) {
				$exists = false;
			}
		} else {
			$exists = false;
		}
	}
	//echo $newgroupcode;
	
	$strSQL = "UPDATE userinformation SET groupcode=$newgroupcode WHERE user_id='$strMemberID'";
	$objQuery = mysqli_query($objConnect, $strSQL);
	if(!$objQuery) {
		echo "error: " . mysqli_error($objConnect);
	}
	else {
		$thirdSQL = "INSERT INTO groupinfo (name,daylimit,playerlimit,datecreated,groupcode) VALUES ('$name','$daylimit','$playerlimit','$date','$newgroupcode')";
		if(mysqli_query($objConnect,$thirdSQL)){ 
			echo 'success,';
		} else {
			echo "Error description: " . mysqli_error($objConnect) . $date . $name . $daylimit . $hourlimit . $playerlimit . $date;
		}
		echo $newgroupcode;
	}
	mysqli_close($objConnect);
?>