<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

         <script>
                
               
                    
                       getCarInfo();
        
                function getCarInfo() {    
                $.ajax({
                    type: "GET",
                    url: "api/getCarInfo.php",
                    dataType: "json",
                     data : {"carId": <?=$_GET['carId']?>},
                    success: function(data, status) {
 
                         
        
                    
                         $("#make").val(data["make"]);
                         $("#model").val(data["model"]);
                         $("#year").val(data["year"]);
                         $("#type").val(data["type"]);
                         $("#price").val(data["price"]).change();
                         
                         if(data["transmission"] == "Automatic")
                         {

                               $('#transmission1').click(); 

                         }
                         else if(data["transmission"] == "Manual")
                         {
                               $('#transmission2').click(); 

                         }
                         
                         
                         $("#odometer").val(data["odometer"]).change();
                         $("#image").val(data["image"]).change();
                         $("#price").val(data["price"]).change();
                         $("#color").val(data["color"]).change();
                         
                    }
                });
                }
                    
                
                $(document).ready(function(){  
                    
   
                
                
               
                    
                    $("#submitButton").on("click",function(){
                        
                    let transmission = "";

                    if($("#transmission1").is(":checked"))
                {
                    transmission = "Automatic";
                }
                else  if($("#transmission2").is(":checked"))

                {

                    transmission = "Manual";
                }
                

                        $.ajax({
                            type: "GET",
                            url: "api/updateCarAPI.php",
                            dataType: "json",
                            data:{"carId": <?=$_GET['carId']?>,
                        
                        
                                "make": $("#make").val(),
                                "model": $("#model").val(),
                                "year": $("#year").val(),
                                "type": $("#type").val(),
                                "transmission": transmission,
                                "odometer": $("#odometer").val(),
                                "image": $("#image").val(),
                                "color": $("#color").val(),
                                "price": $("#price").val()
                                
    
                            },
                            success: function(data, status) {
                                //$("#updated").html("Product Updated");

                            }
                            
                        });//end
                      //  $("#updated").html("Product Updated");
                    });
                    
                    
                });//documentReady
                
                
                
                
    
                
                
                </script>
        
        
    </head>
    <body>
        
       <br>
        <div class="row ">
          
         <div class="col">
           </div>



    
        <div class="jumbotron col-8">
    <h1 class="display-4 text-center">Update Car</h1>
    <br>
    <br>


    <form>
        <h4 class="display-8">Car Information</h4>




      <div class="form-group">
        <label for="make">Make</label>
        <input type="text" class="form-control" id="make" >
      </div>

      <div class="form-group">
        <label for="model">Model</label>
        <input type="text" class="form-control" id="model">
      </div>

      <div class="form-group">
        <label for="year">Year</label>
        <input type="text" class="form-control" id="year">
      </div>

      <div class="form-group">
        <label for="color">Color</label>
        <input type="text" class="form-control" id="color">
      </div>

      <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" id="type">
      </div>


      <div class="form-group">
        <label for="odometer">Odometer</label>
        <input type="text" class="form-control" id="odometer">
      </div>
      
      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price">
      </div>
      
      <div class="form-group">
        <label for="image">Image</label>
        <input type="text" class="form-control" id="image">
      </div>

        Transmission
        <div class="form-check">
          <input class="form-check-input" type="radio" name="transmission" id="transmission1" value="option1">
          <label class="form-check-label" for="autoRadio">
            Automatic
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="transmission" id="transmission2" value="option2">
          <label class="form-check-label" for="manualRadio">
            Manual
          </label>
        </div>
        <br>
        

        <button  id="submitButton" type="submit" class="btn btn-primary">Submit</button>
      </form>

  </div>
        
        
                 <div class="col">
           </div>
           
           
   </div>

    
    
    
    </body>
</html>