<?php
    session_start();
    include 'loadHeader.php';
    

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Cars </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        <!--bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <!--fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        
        <link rel="stylesheet" href="css/admin.css" type="text/css" />
        <script>
        
        
        
        
        
        

            
            $(document).ready(function(){

                $.ajax({

                    type: "GET",
                    url: "api/getpurchaseHistory.php",
                    dataType: "json",
                    success: function(data,status) {
        
                
                
                
                let htmlString = "";
                 let i = 0;
                $("#images").html("");
                for (let rows=0; rows < data.length; rows++) {
                   if(data[i] !=null){
                    htmlString += "<div class='row'style='margin-bottom: 100px;' >";
                   }

                    for (let cols=0; cols < 5; cols++) {
                        if(data[i] !=null){
                            
                            
                    carMake =  data[i]["make"];
                    carModel =  data[i]["model"];  
                    carType =  data[i]["type"];        
                    carYear =  data[i]["year"];
                    carColor =  data[i]["color"];
                    carTransmission =  data[i]["transmission"];
                    carOdometer =  data[i]["odometer"];
                    carPrice =  data[i]["price"];
                    carImage =  data[i]["image"];

                      htmlString += "<div class='col card' >";

                     htmlString += "<br><a class=\"btn btn-outline-primary\"  href='update.php?carId="+data[i]['carId']+"'> Update </a>" +
                                                "<form action='api/deleteCarAPI.php' method='post' onsubmit='return confirmDelete()'>"+
                                                "<input type='hidden' name='carId' value='"+ data[i]['carId'] + "'>" +
                                                "<button class=\"btn btn-outline-danger\">Delete</button></form>" ;
                     
                     
                     htmlString +=   "<div> " + "Type: " + carType+ "</div>";
                     htmlString +=   "<div> " + "Make: " + carMake+ "</div>";
                     htmlString +=   "<div> " + "Model: " + carModel+ "</div>";
                     htmlString +=   "<div> " + "Year: " + carYear+ "</div>";
                     htmlString +=   "<div> " + "color: " + carColor+ "</div>";
                     htmlString +=   "<div> " + "Transmission: " + carTransmission+ "</div>";
                     htmlString +=   "<div> " + "Odometer: " + carOdometer+ "</div>";
                     htmlString +=   "<div> " + "Price: $" + carPrice+ "</div>";
                     htmlString +=  "<img class='rounded mx-auto d-block' src='"+ carImage+"' width='100%' >";

                     

                      htmlString += "</div >";

                        }
                         i++;

                    }//for
                    
                    htmlString += "</div>";

                }//for
               
               $("#cars").append(htmlString);
               
               
                
                    }
                    
                });//ajax
                
              
            });//documentReady
            
        </script>
        
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     

        
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </head>
    <body>
                <nav class="navbar navbar-expand-lg">
            <h1 id="websiteName">WEBSITE NAME HERE</h1>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?=isAdmin()?>
                </ul>
            </div>
            <?=displayNavButtons()?>
        </nav>

         <div class="jumbotron text-center">


    <!--    <form action="logout.php">-->
    <!--    <button class ="btn btn-danger text-center">Logout</button>-->
    <!--</form>-->
        <h1 class="text-center"> Cars - Admin Page </h1>



        <h4 class="text-center"> Welcome <?=$_SESSION['adminName']?>  <br>  <br>   
</h4>

        </div>

        
            <br>

    
    
         <div class=" text-center">


        <form action="addCars.php" class="text-center">
        <button class ="btn btn-primary text-center">Add New Car</button>
        </form>
    
</div>

    <br><br>
    
                 <div class= "row">

         <div class= "col"></div>

     <div class= "col-11" id="cars"></div>
     
              <div class= "col"></div>
            </div>
    </body>
</html>