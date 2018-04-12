<?php 
	define('HOST','den1.mysql5.gear.host');

	define('USER','userinformation1');

	define('PASS','Ox750!N-4Omp');

	define('DB','userinformation1');


	 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');



	
	if($_SERVER['REQUEST_METHOD']=='POST'){

	$username = $_POST['email'];
		
	$password = $_POST['password'];


	$sql = "SELECT * FROM signup WHERE email='$username' AND password='$password'";

	
	$result = mysqli_query($con,$sql);

	$check = mysqli_fetch_array($result);

	
	if(isset($check))
	{

	echo "success";

	}
	else{

	echo "failure";

	}

		mysqli_close($con);

	}