<?php
	$objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	//$objDB = mysqli_select_db("userinformation1");
	
	$groupCode = $_POST["groupCode"];
	$strMemberID = $_POST["id"];
	
	$sql = "SELECT * FROM groupinfo WHERE groupcode='".$groupCode."'";
	$objQuery = mysqli_query($objConnect, $sql);
	
	if(!$objQuery) {
		$output['groupCode'] = $groupCode; 
		$output['Error'] = mysqli_error($objConnect);	
	} else {
		if ($objQuery->num_rows > 0) {
			// output data of each row
			while($row = $objQuery->fetch_assoc()) {
				$output[$row["groupcode"]] = $row["datecreated"]. "," .$row["playerlimit"]. "," . $row["hourlimit"]. "," .$row["daylimit"]. "," .$row["name"];				
			}
		} else{
			echo "No Result";
			$output['groupCode'] = $groupCode;
			$output['sql'] = $sql;
		}
	}
	
	$strSQL = "UPDATE userinformation SET groupcode=$groupCode WHERE user_id='$strMemberID'";
	$objQuery = mysqli_query($objConnect, $strSQL);
	if(!$objQuery)	{
		echo $output["Failed to upload to server."];
	} else	{
		echo $output["Success"];
	}

	mysqli_close($objConnect);
	
	echo json_encode($output);
	