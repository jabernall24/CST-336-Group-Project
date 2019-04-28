<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login Screen </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="css/login.css" type="text/css" />
        
        <script>
            var valid = <?=$_SESSION['valid']; unset($_SESSION['valid'])?>;
        </script>
    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg">
            <h1 id="websiteName">WEBSITE NAME HERE</h1>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addCars.php">Add Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="update.php">Update Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                </ul>
            </div>
        </nav>

        
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
                        
                        <span id="error"></span> <br/>
                        <button class="btn btn-outline-primary">Login</button>
                        <button type="button" class="btn btn-outline-primary" id="signup">Sign up</button>
                        <br>
                        <br>
                        <br>
                        *Test Note*    Login using an account under your om_admin database                
                    </form>
            </div>
        </main>
        
        <script type="text/javascript" src="js/login.js"></script>

    </body>
</html>