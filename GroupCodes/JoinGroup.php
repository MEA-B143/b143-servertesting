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
				$output["groupcode"] = $row["groupcode"]. "," .$row["datecreated"]. "," .$row["playerlimit"]. "," . $row["hourlimit"]. "," .$row["daylimit"]. "," .$row["name"];				
				$playerLimit = $row["playerlimit"];
			}

			
			$plSQL = "SELECT * FROM userinformation WHERE groupcode='".$groupCode."'";
			$plQuery = mysqli_query($objConnect, $plSQL);
			
			if(!$plQuery){
				$output["Error"] = mysqli_error($objConnect);
			} else {
				$intPlayerAmount = $plQuery->num_rows;
				
				if (10 > 2) { 
					$groupCodeInt = (int)$groupCode;
	
					$strSQL = "UPDATE userinformation SET groupcode=$groupCode WHERE user_id='$strMemberID'";
					$objStrQuery = mysqli_query($objConnect, $strSQL);
					if(!$objStrQuery))	{
						echo "Failure";
					} else	{
						echo "Success";
					}
				}
			}
			
		} else{
			$output["NoGroupCode"] = "Group code doesn't exist.";
		}
	}
	
	mysqli_close($objConnect);
	
	echo json_encode($output);
	