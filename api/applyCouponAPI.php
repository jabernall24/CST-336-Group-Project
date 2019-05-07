<?php

    include '../dbConnection.php';
    $conn = getDatabaseConnection("ottermart");

        $coupon = $_GET['coupon'];
        
        $sql = "SELECT * FROM coupons WHERE couponCode = $coupon";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        

        echo json_encode($product);

?>