<!DOCTYPE html>
<html>
    <head>
        <title> Search </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           <link href="css/searchStyles.css" rel="stylesheet" type="text/css" />
    <script>
    /* global $  */
        getCarInfo();
        function cartAdd(id){
        // TODO: CART ADD... for now it'll just display the ID of the object being placed.
            alert(id);
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
                $("#cars").append("<button class = 'buttons' id ='" + data[i]["carId"] + "' onclick ='" + "cartAdd(" + data[i]["carId"]+")" + "'> Add to cart!</button></div> <br>");
                // TODO: make cart button connect to cart
                
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
                $("#cars").append("<button class = 'buttons' id ='" + data[i]["carId"] + "' onclick ='" + "cartAdd(" + data[i]["carId"]+")" + "'> Add to cart!</button></div> <br>")
            }
            }
        });
        });
        });
        
    </script>
    </head>
    <body>
        <h1> Search </h1>
        <div id = "submitArea">
        <input type="text" id = "query">
        <button id="submit">Submit</button>
        <span class = "Text">Transmission:</span>
        <select id = "transmissionSelect">
                <option>Select one</option>
                <option>Automatic</option>
                <option>Manual</option>
        </select>
        <span class = "Text">Vehicle type:</span>
        <select id = "typeSelect">
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