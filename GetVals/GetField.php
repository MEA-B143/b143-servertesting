<?php
	$objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1");
	//$objDB = mysqli_select_db("userinformation1");
	
	$strMemberID = $_POST["id"];
	$strScore = $_POST["field"];
	$intScore = (int)$strScore;
	
		$sql = "SELECT '$field' FROM userinformation WHERE user_id='$strMemberID'";
		$result = $objConnect->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$fieldValue = $row["$field"];
			}
		} else {
			echo "0 results";
		}
			
		$arr['returnValue'] = $fieldValue;
	
	mysqli_close($objConnect);
	
	echo json_encode($arr);
?>