<?php

    include '../dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    
$action = $_GET["action"];
$imageURL = $_GET["imageURL"];
$keyword = $_GET["keyword"];

 
   $arr = array();
    
    
    
    $action = $_GET["action"];
    
    $arr[":imageURL"] = $_GET["imageURL"];
    $arr[":keyword"] = $_GET["keyword"];

  

   $sql = "INSERT INTO lab8_pixabay ( `imageURL`, `keyword`) 
    VALUES (:imageURL, :keyword)";
   
   
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);






?>