<?php
include '../dbConnection.php';
$conn = getDatabaseConnection("ottermart");
$q = $_GET['search'];
$tr = $_GET['transmission'];
$ty = $_GET['type'];
$namedParameters = array();

$sql = "SELECT * FROM cars WHERE 1"; //Retrieves ALL records

if (!empty($q)) { //user entered a product keyword
    $sql .=  " AND (make LIKE :search OR model LIKE :search OR year LIKE :search)";
    $namedParameters[":search"] = $q;
}

if ($tr != "Select one") { //user selected a transmission type
    $sql .=  " AND transmission = :transmission";
    $namedParameters[":transmission"] = $tr;
}

if ($ty != "Select one") { //user selected a vehicle type
    $sql .=  " AND type = :type";
    $namedParameters[":type"] = $_GET['type'];
}

$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($namedParameters);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
//print_r($records); //debugging    
echo json_encode($records);

?>