<?php
    $objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	
	//date_default_timezone_set('Europe/Copenhagen');

	$strMemberID = $_POST["id"];
	$name = $_POST["name"];
	$daylimit = (int)$_POST["daylimit"];
	$hourlimit = (int)$_POST["hourlimit"];
	$playerlimit = (int)$_POST["playerlimit"];
	//$datecreated = date("Y-m-d H:i:s");
	
	$sql = "SELECT groupcode FROM userinformation";
	$result = $objConnect->query($sql);
	if (!result) {
		echo "error: " . mysqli_error($con);
	} else {
		echo "success 1";
	}
	$exists = true;
	
	// Continue generating new group IDs until one is generated that doesn't already exist
	/*
	while ($exists == true) {
		$newgroupcode = rand(10000, 99999);
		echo $newgroupcode;
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
	echo $newgroupcode;
	
	$strSQL = "UPDATE userinformation SET groupcode=$newgroupcode WHERE user_id='$strMemberID'";
	$objQuery = mysqli_query($objConnect, $strSQL);
	if(!$objQuery) {
		echo "error: " . mysqli_error($con);
	}
	else {
		$sql = "INSERT INTO groupinfo (name,daylimit,hourlimit,playerlimit,datecreated,groupcode) VALUES ('$name','$daylimit','$hourlimit','$playerlimit', '$dateCreated','$newgroupcode')";
		if(mysqli_query($con,$sql)){
			echo 'successfully registered';
		} else {
			echo "Error description: " . mysqli_error($con);
		}
		echo $newgroupcode;
	}*/
	mysqli_close($con);
?>