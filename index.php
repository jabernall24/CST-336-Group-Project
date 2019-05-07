<?php
    include 'loadHeader.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Home </title>
        <!--jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        <!--bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <!--fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        
        <!--css-->
        <link rel="stylesheet" href="css/index.css" type="text/css" />
        <link rel="stylesheet" href="css/loadHeader.css" type="text/css" />
    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg">
            <?=displayWebsiteName()?>
            <?=loadSkeleton()?>
            <?=displayNavButtons()?>
        </nav>

        
        <img id = "banner" src="img/logo.png"></img><br>
        <br>
        <form action="search.php" method="GET">
            <strong>Search:</strong> <input type="text" name="search" id="carSearch" />
            <button class="btn btn-primary btn-sm">Search</button>
        </form>
        <strong id ="f">Featured Car</strong> <br>
        <strong id="featuredCarName"></strong> <br/>
        <input type="hidden" name="signedIn" value="<?=$_SESSION['username']?>"/>
        <main>
            <div id="left">
                <img src="" alt="featured car image" id="featuredCarImage">
            </div>
            <div id="right">
                <strong>Price: </strong><span id="featuredCarPrice"></span> <br/>
                <strong>Mileage: </strong><span id="featuredCarMileage"></span> <br/>
                <strong>Transmission: </strong><span id="featuredCarTransmission"></span> <br/>
                <strong>Color: </strong><span id="featuredCarColor"></span> <br/>
                
                <form action="addToCart.php" method="POST">
                    <input type="hidden" name="sender" value="index.php"/>
                    <input type="hidden" name="carId"/>
                    <button id='addToCartButton' class="btn btn-info btn-lg">
                        <span class="fas fa-shopping-cart"></span> Add to cart
                    </button>
                </form>
            </div>
        </main>
        
        <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>