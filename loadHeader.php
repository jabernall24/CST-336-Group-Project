<?php
    session_start();
    // print_r($_SESSION);
    function displayNavButtons() {
        if (isset($_SESSION['adminName'])){
            echo "
            <strong id='usersName'>Hello, ".$_SESSION['adminName']."</strong><form action='logout.php'>
            <button id='logoutBtn' class='btn btn-danger'><span class='fas fa-sign-in-alt'></span>Log out</button>
            </form>";
        } else if(isset($_SESSION['user'])) {
            echo "
            <strong id='usersName'>Hello, ".$_SESSION['user']."</strong><form action='logout.php'>
            <button id='logoutBtn' class='btn btn-danger'><span class='fas fa-sign-in-alt'></span>Log out</button>
            </form>";
        }else {
            echo "
            <strong id='usersName'>Hello, Guest</strong><form action='login.php'>
            <button id='logoutBtn' class='btn btn-primary'><span class='fas fa-sign-in-alt'></span>Log in</button>
            </form>";
        }
    }
    
    function isAdmin() {
        if(isset($_SESSION['adminName']) || isset($_SESSION['user'])) {
            echo "<li class='nav-item'>
                <a class='nav-link' href='cart.php'>Cart</a>
              </li>";
        }

        if (isset($_SESSION['adminName'])) {
            echo "<li class='nav-item'>
                        <a class='nav-link' href='admin.php'>Admin</a>
                    </li>";
        }
    }

?>