<?php

    include '../dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    
    $arr = array();
    
    
    
    $arr[":make"] = $_GET["make"];
    $arr[":model"] = $_GET["model"];
    $arr[":year"] = $_GET["year"];
    $arr[":color"] = $_GET["color"];
    $arr[":type"] = $_GET["type"];
    $arr[":transmission"] = $_GET["transmission"];
    $arr[":odometer"] = $_GET["odometer"];
    $arr[":price"] = $_GET["price"];
    $arr[":image"] = $_GET["image"];

  
   $sql = "INSERT INTO cars ( `make`, `model`, `year`, `color`, `type`, `transmission`, `odometer`, `price`, `image`) 
    VALUES (:make, :model, :year, :color, :type, :transmission, :odometer, :price, :image)";
   
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    $sql ="SELECT COUNT(1) totalCars FROM cars";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($records);



?>