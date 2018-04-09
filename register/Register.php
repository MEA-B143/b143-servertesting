<?php
    $con = mysqli_connect("den1.mysql5.gear.host", "userinformation1", "Ox750!N-4Omp", "userinformation1");
	
    $username = $_POST["username"];
    $password = $_POST["password"];
	$email = $_POST["email"];

    $statement = mysqli_prepare($con, "INSERT INTO `userinformation` (username, email, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($statement, "siss", $username, $email, $password);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>
