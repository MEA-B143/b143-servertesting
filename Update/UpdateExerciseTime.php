<?php
	$objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	//$objDB = mysqli_select_db("userinformation1");
	

	$strMemberID = $_POST["id"];
	$strSeconds = $_POST["seconds"];
	$intSeconds = (int)$strSeconds;
	
	/*** Update ***/
	//$strSQL = "UPDATE userinformation SET secondsofexercise=secondsofexercise+$intSeconds WHERE user_id='$strMemberID'";
	$strSQL = "UPDATE userinformation SET secondsofexercise=$intSeconds WHERE user_id='$strMemberID'";

	$objQuery = mysqli_query($objConnect, $strSQL);
	if(!$objQuery)
	{
		$arr['StatusID'] = "0"; 
		$arr['Error'] = mysqli_error($objConnect);	
		$arr['id'] = $strMemberID;
		$arr['score'] = $strScore;
	}
	else
	{
		$arr['StatusID'] = "1"; 
		$arr['Error'] = "";	
		$sql = "SELECT secondsofexercise FROM userinformation WHERE user_id='$strMemberID'";
		$result = $objConnect->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$currentScore = $row["secondsofexercise"];
			}
		} else {
			echo "0 results";
		}
			
		$arr['secondsofexercise'] = $currentScore;
	}

	/**
		$arr['StatusID'] // (0=Failed , 1=Complete)
		$arr['Error'] // Error Message
	*/
	
	mysqli_close($objConnect);
	
	echo json_encode($arr);
?>