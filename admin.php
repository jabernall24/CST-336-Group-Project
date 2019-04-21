<?php
session_start();

//checks whether user has logged in
if (!isset($_SESSION['adminName'])) {
    
    header('location: login.php'); //sends users to login screen if they haven't logged in
    
}

?>






<!DOCTYPE html>
<html>
    <head>
        <title> Cars </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        <script>
        
            function confirmDelete(){
                
                return confirm("Are you sure you want to delete this product?");
                
            }
            
            function openModal(){
                $('#productModal').modal("show"); //opens the modal
            }
            
            $(document).ready(function(){

                $.ajax({

                    type: "GET",
                    url: "api/getAllCars.php",
                    dataType: "json",
                    success: function(data,status) {
                      data.forEach(function(car){
                          $("#cars").append("<div class='row'>" + 
                                                "<div class='col1'>" + 
                                                "<a class=\"btn btn-primary\"  href='update.php?productId="+car.carId+"'> Update </a>" +
                                                //"[<a href='delete.php?productId="+product.productId+"'> Delete </a>]" +
                                                "<form action='delete.php' method='post' onsubmit='return confirmDelete()'>"+
                                                "<input type='hidden' name='productId' value='"+ car.carId + "'>" +
                                                "<button class=\"btn btn-outline-danger\">Delete</button></form>" +
                                                "<a target='productIframe' onclick='openModal()' href='productInfo.php?productId="+car.carId+"'> " + car.make + " " + car.model + "</a></div>"+
                                                "<div class='col2'>" + "TYPE: " + car.type + "  " +"YEAR: "+ car.year + "  " + "COLOR: " + car.color + "  " + "MILES: " + car.odometer + "  " + "TRANSMISSION: " + car.transmission + "  " + "PRICE: $" +car.price + "</div>"+
                                                "</div><br>");
                      })
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);

                    }
                    
                });//ajax
                
              


            });//documentReady
            
        </script>
        
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     

        <style>
        
            .row  { display:flex; }
        
            .col1 { width:350px; }
            
            form { display: inline-block; }
            
            #products {
                 margin: 35px;
            }

        </style>   
        
        
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </head>
    <body>

        <h1> Cars - Admin Page </h1>

        Welcome <?=$_SESSION['adminName']?>
        
    <br><hr><br>
    
    <form action="addCars.php">
        <button>Add New Product</button>
    </form>
    
    <form action="logout.php">
        <button>Logout</button>
    </form>
    
    <br><br>
    
     <div id="cars"></div>
     
     

    </body>
</html>