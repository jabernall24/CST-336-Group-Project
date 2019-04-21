<?php
session_start();

if ($_SESSION['valid'] === "false") {
    echo('invalid login'); 
unset($_SESSION['valid']); //reset session variable so if user loads page, it does not show error unless they attemp login

    
}


?>




<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login Screen </title>
        
        
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

               
    </head>
    <body>

    
        <form method="POST" action="loginProcess.php">
            
            Username: <input type="text" name="username" id="username"/> <br/>
            
            Password: <input type="password" name="password"/> <br/>
            
            <input type="submit" value="Login!" >
            <br>
            <br>
            <br>
             *Test Note*    Login using an account under your om_admin database                
            
        </form>
        



<script>

    
    
</script>

    </body>
</html>