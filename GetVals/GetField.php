<?php
	$objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	//$objDB = mysqli_select_db("userinformation1");
	
	$strMemberID = $_POST["id"];
	$field = $_POST["field"];
	if (strpos($field, ',') !== false) {
		$field = explode(',', $field);
	} else {
		$field = array($field);
	}
	
	$return = "";
	
	foreach($field as &$columnname) {
		switch ($columnname) {
			case "score":
				$sql = "SELECT score FROM userinformation WHERE user_id='$strMemberID'";
				$result = $objConnect->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$currentScore = $row["score"];
					}
				} else {
					$currentScore = "null";
				}
					
				$arr['score'] = $currentScore;
				$return = $return + $currentScore + ",";
				break;
			case "groupcode":
				$sql = "SELECT groupcode FROM userinformation WHERE user_id='$strMemberID'";
				$result = $objConnect->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$currentScore = $row["groupcode"];
					}
				} else {
					$currentScore = "null";
				}
					
				$arr['groupcode'] = $currentScore;
				$return = $return + $currentScore + ",";
				break;
			case "customisation":
				$sql = "SELECT customisation FROM userinformation WHERE user_id='$strMemberID'";
				$result = $objConnect->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$currentScore = $row["customisation"];
					}
				} else {
					$currentScore = "null";
				}
					
				$arr['customisation'] = $currentScore;
				$return = $return + $currentScore + ",";
				break;
			case "username":
				$sql = "SELECT username FROM userinformation WHERE user_id='$strMemberID'";
				$result = $objConnect->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$currentScore = $row["username"];
					}
				} else {
					$currentScore = "null";
				}
					
				$arr['username'] = $currentScore;
				$return = $return + $currentScore + ",";
				break;
			case "level":
				$sql = "SELECT level FROM userinformation WHERE user_id='$strMemberID'";
				$result = $objConnect->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$currentScore = $row["level"];
					}
				} else {
					$currentScore = "null";
				}
					
				$arr['level'] = $currentScore;
				$return = $return + $currentScore + ",";
				break;
			case "email":
				$sql = "SELECT email FROM userinformation WHERE user_id='$strMemberID'";
				$result = $objConnect->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						$currentScore = $row["email"];
					}
				} else {
					$currentScore = "null";
				}
					
				$arr['email'] = $currentScore;
				$return = $return + $currentScore + ",";
				break;
			default:
				$arr[$columnname] = "null";
		}
	}
	mysqli_close($objConnect);
	echo $return;
	//echo json_encode($arr);
	//echo $arr;
?>