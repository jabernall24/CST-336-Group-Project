<?php
session_start();

//checks whether user has logged in
if (!isset($_SESSION['adminName'])) {
    
    header('location: login.html'); //sends users to login screen if they haven't logged in
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    </head>
    <body>
        
        <h1>Add new product</h1>
        Type:<input type="text" id = "carType" size="50">
        <br>        
        Make:<input type="text" id = "carMake" size="50">
        <br>
        Model:<input type="text" id = "carModel" size="50">
        <br>        
        Year:<input type="text" id = "carYear" size="50">
        <br>        
        Color:<input type="text" id = "carColor" size="50">
        <br>
        Transmission:<input type="text" id = "carTransmission" size="50">
        <br>
        Image:<input type = "text" id = "carImage">
        <br/>
        Price: <input type="text" id="carPrice">
        <br/>

        <button id="submitButton">Add Car</button>
        Button does not work yet
        <span id="totalProducts"></span>
    </body>
    
    <script>
    /*
        $.ajax({
                    type: "GET",
                    url: "api/getCategories.php",
                    dataType: "json",
                    success: function(data, status) {
                        data.forEach(function(key) {
                            $("#catId").append("<option value=" + key["catId"] + ">" + key["catName"] + "</option>");
                        });
                    }
                }); 
                
        $("#submitButton").on("click", function(){
                   //alert("test");
                   $.ajax({
                    type: "GET",
                    url: "api/addProductAPI.php",
                    dataType: "json",
                    data : {"productName": $("#productName").val(),
                        "productDescription": $("#productDescription").val(),
                        "productImage": $("#productImage").val(),
                        "productPrice": $("#productPrice").val(),
                        "catId": $("#catId").val()
                        
                    },
                    success: function(data, status) {
                        $("#totalProducts").html(data.totalproducts + " Products");
                    }
                }); 
        });
        */
    </script>
</html>