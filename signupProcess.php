<?php

    session_start(); //starts or resumes an existing session

    include 'dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    
    $username = $_POST['username'];
    $firstName = $_POST['first'];
    $lastName = $_POST['last'];
    $password = sha1($_POST['password']);
    
    $namedParameters = array();
    $namedParameters[":username"] = $username;

    $sql = "SELECT COUNT(username) username FROM om_admin WHERE username = :username";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we are expecting ONLY one record, so we use fetch instead of fetchAll
    
    if($record['username'] > 0) {
        header('location: signup.php'); //redirecting to a new file
        $_SESSION['valid'] = "false";
    }else {
        $sql = "INSERT INTO om_admin (firstName, lastName, username, password) 
        VALUES (:firstName, :lastName, :username, :password);";
        
        $namedParameters[":password"] = $password;
        $namedParameters[":firstName"] = $firstName;
        $namedParameters[":lastName"] = $lastName;
    
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);

        $_SESSION['valid'] = "true";
        header('location: index.php'); //redirecting to a new file
    }
    
    // print_r($record);
    
    // if (empty($record)) {
    //     header('location: login.php'); //redirecting to a new file
        
    //     $_SESSION['valid'] = "false";
    // }  else {
    //     //echo $record[0]['firstName']; //using fetchAll
    //     //echo $record['firstName'] . " " . $record['lastName'] ; //using fetch
        // 
        // $_SESSION['valid'] = "true";
        
        // $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
        // header('location: admin.php'); //redirecting to a new file
    // }
?>