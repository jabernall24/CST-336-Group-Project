<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
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
        
        <script>
            var admin = false;
            if (<?=isset($_SESSION['adminName'])?>) {
                admin = true;
            }
        </script>
    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg">
            <h1 id="websiteName">WEBSITE NAME HERE</h1>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addCars.php">Add Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="update.php">Update Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                </ul>
            </div>
            <form action="login.php">
                <button id="logInBtn" class="btn btn-primary"><span class="fas fa-sign-in-alt"></span>Log in</button>
            </form>
            <form action="logout.php">
                <button id="logoutBtn" class="btn btn-danger"><span class="fas fa-sign-in-alt"></span>Log out</button>
            </form>
        </nav>
        
        <br/>
        
        <div id="search">
            <input type="text" name="" id="carSearch" />
            <button type="button" class="btn btn-primary btn-sm">Search</button>
        </div>
        
        <strong id="featuredCarName"></strong> <br/>
        
        <main>
            <div id="left">
                <img src="" alt="featured car image" id="featuredCarImage">
            </div>
            <div id="right">
                <strong>Price: </strong><span id="featuredCarPrice"></span> <br/>
                <strong>Mileage: </strong><span id="featuredCarMileage"></span> <br/>
                <strong>Transmission: </strong><span id="featuredCarTransmission"></span> <br/>
                <strong>Color: </strong><span id="featuredCarColor"></span> <br/>
                
                <button href="#" class="btn btn-info btn-lg">
                    <span class="fas fa-shopping-cart"></span> Add to cart
                </button>
                
            </div>
        </main>
        
        <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>