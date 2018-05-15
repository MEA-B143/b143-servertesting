<?php
	$objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	
	$groupCode = $_POST["groupCode"];
	$strMemberID = $_POST["id"];
	

	$SQL = "UPDATE userinformation SET groupcode=NULL, score=0 WHERE user_id='$strMemberID'";
	$objQuery = mysqli_query($objConnect, $SQL);
	
	if($objQuery) {
		//success I guess
		$output["success"] = 1;
	} else {
		$output['id'] = $strMemberID; 
		$output['Error'] = mysqli_error($objConnect);
	}
	
	
	$plSQL = "SELECT * FROM userinformation WHERE groupcode='".$groupCode."'";
	$plQuery = mysqli_query($objConnect, $plSQL);

	if($plQuery){
		$intPlayerAmount = (int)$plQuery->num_rows;
		
		if ($intPlayerAmount == 0) { 
		
			$deleteSQL = "DELETE FROM groupinfo WHERE groupcode='$groupCode'";
			$deleteQuery = mysqli_query($objConnect, $deleteSQL);
		
			if($deleteQuery){
			//If the user is the last player leaving the group, delete the group
				$output["success"] = 2;
			}
		}
	} else {
	$output['groupCode'] = $groupCode; 
	$output['Error'] = mysqli_error($objConnect);
	}
	
	
	echo json_encode($output);
	mysqli_close($objConnect);
?>