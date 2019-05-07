<?php
    include 'loadHeader.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Search </title>
        <!--jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!--styles-->
        <link href="css/searchStyles.css" rel="stylesheet" type="text/css" />
        <!--bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--Font-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script>
    /* global $  */
        
        getCarInfo();
        
        function cartAdd(id){
        if($("#"+id).text().trim() == "Add to cart!"){
            /*** Adds to cart and blanks button out ***/
            if(0<?=$_SESSION['username']?> == 0){
             alert("Please sign in");   
            }
            else{
            $.ajax({
            type: "POST",
            url: "addToCart.php",
            dataType: "json",
            data : {"carId":id,
                    "username": 0<?=$_SESSION['username']?>
            },
            success: function(data, status) {
            }
            });
            
            $("#"+id).html("Added!")
            document.getElementById(id).disabled = true;
            }
        }
        /*** for testing purposes ***/
            //alert(id);
            //alert(<?=$_SESSION['username']?>);
            
        }
        function getCarInfo() {    
        $.ajax({
            type: "GET",
            url: "api/getAllCars.php",
            dataType: "json",
             data : {},
            success: function(data, status) {
            for(var i = 0; i < data.length; i++){
                $("#cars").append("<div class = 'carDiv'><img class = 'carpic' src='" + data[i]["image"] + "' alt = 'car' height='100' width='115' /> ");
                $("#cars").append("<span class = 'carname'>" + data[i]["make"] + " " + data[i]["model"] + " " + data[i]["year"] + "</span>" + "<br>" );
                $("#cars").append("<span class = 'cardetails'>" + "Type: " + data[i]["type"] + ",  Color: " + data[i]["color"] + ",  Transmission: " + data[i]["transmission"] + ",  Odometer: " + data[i]["odometer"] + ",  Price: $" + data[i]["price"] + " " + "</span>");
                $("#cars").append("<button class = 'btn btn-info btn-lg buttons fas fa-shopping-cart' id ='" + data[i]["carId"] + "' onclick ='" + "cartAdd(" + data[i]["carId"]+")" + "'> Add to cart! </button></div> <br>");
                
            }
            }
        });
        }
        $(document).ready(function(){  
        $("#submit").on("click",function(){
            $("#cars").empty();
            $.ajax({
            type: "GET",
            url: "api/searchCars.php",
            dataType: "json",
            data : {"search":$("#query").val(),
                    "transmission":$("#transmissionSelect").val(),
                    "type":$("#typeSelect").val(),
            },
            success: function(data, status) {
            for(var i = 0; i < data.length; i++){
                $("#cars").append("<div class = 'carDiv'><img class = 'carpic' src='" + data[i]["image"] + "' alt = 'car' height='100' width='115' /> ");
                $("#cars").append("<span class = 'carname'>" + data[i]["make"] + " " + data[i]["model"] + " " + data[i]["year"] + "</span>" + "<br>" );
                $("#cars").append("<span class = 'cardetails'>" + "Type: " + data[i]["type"] + ",  Color: " + data[i]["color"] + ",  Transmission: " + data[i]["transmission"] + ",  Odometer: " + data[i]["odometer"] + ",  Price: $" + data[i]["price"] + "</span>");
                $("#cars").append("<button class = 'btn btn-info btn-lg buttons fas fa-shopping-cart' id ='" + data[i]["carId"] + "' onclick ='" + "cartAdd(" + data[i]["carId"]+")" + "'> Add to cart!</button></div> <br>")
            }
            }
        });
        });
        });
        
    </script>
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
        
        <h1 id = "title"> Search </h1>
        <div id = "submitArea">
        <input type="text" id = "query">
        <button id="submit" class="btn btn-primary btn-sm">Submit</button>
        <span class = "Text">Transmission:</span>
        <select id = "transmissionSelect" class="btn btn-primary dropdown-toggle">
                <option>Select one</option>
                <option>Automatic</option>
                <option>Manual</option>
        </select>
        <span class = "Text">Vehicle type:</span>
        <select id = "typeSelect" class="btn btn-primary dropdown-toggle">
                <option>Select one</option>
                <option>SUV</option>
                <option>Truck</option>
                <option>Sedan</option>
                <option>Coupe</option>
        </select>
        </div>
        <br>
        <div id = "cars"></div>
        
    </body>
</html>