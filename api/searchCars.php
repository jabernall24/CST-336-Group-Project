<?php
include '../dbConnection.php';
$conn = getDatabaseConnection("ottermart");
$q = $_GET['search'];
$tr = $_GET['transmission'];
$ty = $_GET['type'];
$namedParameters = array();

$sql = "SELECT * FROM cars WHERE 1"; //Retrieves ALL records

if (!empty($q)) { //user entered a product keyword
    $sql .=  " AND make LIKE :search OR model LIKE :search OR year LIKE :search";
    $namedParameters[":search"] = "%$q%";
}

if ($tr != "Select one") { //user selected a transmission type
    $sql .=  " AND transmission LIKE :transmission";
    $namedParameters[":transmission"] = "%$tr%";
}

if ($ty != "Select one") { //user selected a vehicle type
    $sql .=  " AND type = :type";
    $namedParameters[":type"] = $_GET['type'];
}
/*
if (!empty($_GET['priceFrom'])) { //user entered a product keyword
    $sql .=  " AND productPrice >= :priceFrom";
    $namedParameters[":priceFrom"] = $_GET['priceFrom'];
}

if (!empty($_GET['priceTo'])) { //user entered a product keyword
    $sql .=  " AND productPrice <= :priceTo";
    $namedParameters[":priceTo"] = $_GET['priceTo'];
}

if (isset($_GET['orderBy'])) { //user entered a product keyword
    if($_GET['orderBy'] == "price"){
        $sql .= " ORDER BY productPrice";
    }
    else if($_GET['orderBy'] == "name"){
        $sql .= " ORDER BY productName";
    }
}*/
$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($namedParameters);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
//print_r($records); //debugging    
echo json_encode($records);

?>