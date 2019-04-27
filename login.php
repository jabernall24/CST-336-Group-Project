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
        
        <link rel="stylesheet" href="css/login.css" type="text/css" />
    </head>
    
    <body>
        <main>
            <div id="websiteImage">
                <img src="img/logo.jpg"></img>
            </div>
            <div id="loginSignUp">
                    <form method="POST" action="loginProcess.php">
                        <h1>Login</h1>
                        Username: <br/>
                        <input type="text" class="form-control form-rounded" name="username" id="username"> <br/>
                        Password: <br/>
                        <input type="password" class="form-control form-rounded" name="password" id="password"> <br/>
    
                        <button class="btn btn-outline-primary">Login</button>
                        <button type="button" class="btn btn-outline-primary" id="signup">Sign up</button>
                        <br>
                        <br>
                        <br>
                        *Test Note*    Login using an account under your om_admin database                
                    </form>
            </div>
        </main>
        
        <script>
            $("#signup").on('click', function() {
                window.location.href = "signup.php";
            })
        </script>

    </body>
</html>