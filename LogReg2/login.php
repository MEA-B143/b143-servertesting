<?php 
	define('HOST','den1.mysql5.gear.host');

	define('USER','userinformation1');

	define('PASS','Ox750!N-4Omp');

	define('DB','userinformation1');


	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$username = $_POST['email'];	
		$password = $_POST['password'];
		$sql = "SELECT * FROM userinformation WHERE email='$username' AND password='$password'";
		$result = mysqli_query($con,$sql);
		$check = mysqli_fetch_array($result);
		$sql2 = "SELECT id FROM userinformation WHERE email='$username' AND password='$password'";
		echo $sql2;
		while($row = mysqli_fetch_array($result)) {
			$retval = $row["id"];
			//echo "3";
		}
		
		if(isset($check)) {
			echo "xd";
		} else {
			echo "failure";
		}
	} else {
		echo "It's fucked cunt.";
	}
	mysqli_close($con);
?>