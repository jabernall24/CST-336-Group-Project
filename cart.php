<?php
    
    session_start();
    include 'loadHeader.php';
    include 'dbConnection.php';
    
    function total(){
        $conn = getDatabaseConnection("ottermart");
        $userId = $_SESSION['username'];
        
        $sql = "SELECT SUM(cars.price) FROM cart INNER JOIN cars ON cart.carId = cars.carId WHERE userId = $userId";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
        echo $record["SUM(cars.price)"];
    }
    
    function makeCall() {
        $conn = getDatabaseConnection("ottermart");
        
        $userId = $_SESSION['username'];
        
        $sql = "SELECT * FROM cart INNER JOIN cars ON cart.carId = cars.carId LEFT JOIN (SELECT carId, COUNT(carId) as total
        FROM cart WHERE userId = $userId GROUP BY carId) A ON A.carId = cart.carId WHERE cart.userId = $userId";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $dups = array();
        
        foreach($record as $key => $val) {
            
            if(!in_array($val["carId"], $dups)) {
                $dups[] = $val["carId"];
                
                echo "
                <tr id='" . $val["carId"] . "'>
                <td class='table-img'><img src='" . $val["image"] . "' width='200'></td>
                <td class='table-desc'>
                <strong class='table-carName'>" . $val["year"] . " " . $val["make"] . " " . $val["model"] . "</strong> <br/><br/>
                <strong>Mileage: </strong> " . $val["odometer"] . " <br/>
                <strong>Transmission: </strong> " . $val["transmission"] . " <br/>
                <strong>Color: </strong> " . $val["color"] . " <br/>
                </td>
                <td>" . $val["total"] . "</td>
                <td class='table-price' >$" . $val["price"] . "</td>
            </tr>";
            }
            
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Cart </title>
        <link rel="stylesheet" href="css/cart.css" type="text/css" />
                <!--jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        <!--bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <!--fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
            <h1 id="websiteName">CARSITE NAME HERE</h1>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.php">Search</a>
                    </li>
                    <?=isAdmin()?>
                </ul>
            </div>
            <?=displayNavButtons()?>
        </nav>
        <table>
            <tr>
                <th>Image</th>
                <th>Description</th>
                <th>Total</th>
                <th>Price</th>
            </tr>
            <?=makeCall()?>
            <tr>
                <th>Total: </th>
                <th></th>
                <th></th>
                <th id = "tot"> $<?=total()?> </th>
            </tr>
        </table>
    </body>
</html>