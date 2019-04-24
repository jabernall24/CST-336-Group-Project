<!DOCTYPE html>
<html>
    <head>
        <title> Home </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <style>
            body {
                text-align: center;
            }
        </style>
    </head>
    
    <body>
        <h1>Car shop</h1>
        
        <input type="text" name="" id="carSearch" /> <br/>
        
        <img src="" alt="" id="featuredCar">
        
        <script>
             $.ajax({
                type: "GET",
                url: "api/getFeaturedCar.php",
                dataType: "json",
                success: function(data, status) {
                    $("#featuredCar").attr('src', data.image);
                }
            });
        </script>
    </body>
</html>