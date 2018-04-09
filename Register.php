<?php
    require("password.php");

    $connect = mysqli_connect("sql11.freemysqlhosting.net", "sql11231550", "hZDXBUDKXP", "sql11231550");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
	$email = $_POST["email"];

     function registerUser() {
        global $connect, $email, $password, $username;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $statement = mysqli_prepare($connect, "INSERT INTO userinformation (username, email, password) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($statement, "siss", $username, $email, $passwordHash);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);     
    }

    function emailAvailable() {
        global $connect, $email;
        $statement = mysqli_prepare($connect, "SELECT * FROM userinformation WHERE email = ?"); 
        mysqli_stmt_bind_param($statement, "s", $email);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $count = mysqli_stmt_num_rows($statement);
        mysqli_stmt_close($statement); 
        if ($count < 1){
            return true;
        }else {
            return false;
        }
    }

    $response = array();
    $response["success"] = false;  

    if (emailAvailable()){
        registerUser();
        $response["success"] = true;  
    }
    
    echo json_encode($response);
?>
