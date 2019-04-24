<!DOCTYPE html>
<html>
    <head>
        <title> Home </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css" type="text/css" />
    </head>
    
    <body>
        <div id="homePageContainer">
            <div id="homePageHeader">
                <h1>WEBSITE NAME HERE</h1>
            </div>
        </div>
        
        <br/>
        
        <div id="search">
            <input type="text" name="" id="carSearch" />
            <button type="button" class="btn btn-primary btn-sm">Search</button>
        </div>
        
        <strong id="featuredCarName"></strong> <br/>
        
        <main>
            <div id="left">
                <img src="" alt="" id="featuredCarImage">
            </div>
            <div id="right">
                <strong>Price: </strong><span id="featuredCarPrice"></span> <br/>
                <strong>Mileage: </strong><span id="featuredCarMileage"></span> <br/>
                <strong>Transmission: </strong><span id="featuredCarTransmission"></span> <br/>
                <strong>Color: </strong><span id="featuredCarColor"></span> <br/>
                
                <a href="#" class="btn btn-info btn-lg">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Add to cart
                </a>
                
            </div>
        </main>
        
        <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>