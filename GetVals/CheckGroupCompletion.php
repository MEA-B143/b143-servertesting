<?php
	$objConnect = mysqli_connect("den1.mysql5.gear.host","userinformation1","Ox750!N-4Omp","userinformation1") or die('Unable to Connect');
	
	$groupCode = $_POST["groupCode"];
	
	$sql = "SELECT completed FROM groupinfo WHERE groupcode='".$groupCode."'";
	$objQuery = mysqli_query($objConnect, $sql);
	if(!$objQuery) {
		$output['groupCode'] = $groupCode; 
		$output['Error'] = mysqli_error($objConnect);	
	} else {
		if ($objQuery->num_rows > 0) {
			// output data of each row
			while($row = $objQuery->fetch_assoc()) {
				$output["completed"] = $row["completed"];
			}
		} else{
			echo "No Result";
			$output['groupCode'] = $groupCode;
			$output['sql'] = $sql;
		}
	}
	
	mysqli_close($objConnect);
	
	echo json_encode($output);

?>