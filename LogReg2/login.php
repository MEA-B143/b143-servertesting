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
		$sql2 = "SELECT user_id FROM userinformation WHERE email='$username' AND password='$password'";
		$query = mysqli_query($con, $sql2);
		while ($row = $query->fetch_row()) {
			$id = $row[0];
		}
		
		if(isset($check)) {
			echo "success,$id";
		} else {
			echo "Yo login aint aight :b:";
		}
	} else {
		echo "It's fucked cunt.";
	}
	mysqli_close($con);
?>