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
				$playerLimit = $row["playerlimit"];
				$output["groupcode"] = $row["groupcode"]. "," .$row["datecreated"]. "," .$playerLimit. "," .$row["daylimit"]. "," .$row["name"];				
			}

			
			$plSQL = "SELECT * FROM userinformation WHERE groupcode='".$groupCode."'";
			

			if($plQuery = mysqli_query($objConnect, $plSQL)){
				$intPlayerAmount = (int)$plQuery->num_rows;
				
				if ($playerLimit > $intPlayerAmount) { 
					$groupCodeInt = (int)$groupCode;
					
					$strSQL = "UPDATE userinformation SET groupcode=$groupCode WHERE user_id='$strMemberID'";
					if($objStrQuery = mysqli_query($objConnect, $strSQL))	{
						
					} else	{
						$output["Error"] = mysqli_error($objConnect);
					}
				} else {
					$output["TooManyPlayers"] = "Too many people in the group";
				}
			} else {
				$output["Error"] = mysqli_error($objConnect);
				echo json_encode($output);
			}
			
			
		} else{
			$output["NoGroupCode"] = "Group code doesn't exist.";
		}
	}


	echo json_encode($output);
	mysqli_close($objConnect);