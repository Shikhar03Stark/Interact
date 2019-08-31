<?php
session_start();
if(!isset($_SESSION['username'])){
     header("Location: http://localhost/Interact/index.php");
     exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
     <head>
          <meta charset="utf-8">
          <meta description = "Interact - Create New Public POST">
          <link rel = "stylesheet" href = "style.css">
          <title>Interact</title>
     </head>
     <body>
          <div class = "header">
               <span class = "logo"><b><a class = "home" href = "index.php">Interact</a></b></span>
               <span class = "log-button">
                    <form method="post">
                    <?php
                    if(!isset($_SESSION['username'])){
                         echo "<button name = 'login' type = 'submit' formaction='login.php'>Login</button>
                         <button name = 'sign-up' type = 'submit' formaction='signup.php'>Sign Up</button>";
                    }else{

                         echo "<button name = 'logout' type = 'submit' formaction='includes/logout.inc.php'>Logout</button>";
                    }
                    ?>

                    <div class = 'dropdown'>
                    </form>
                      <button class="dropbtn"><img src='images/dropdown.png' width='20px' height = '20px'></button>
                      <div class="dropdown-content">
                        <a href="use.php">How To Use</a>
                        <a href="about.php">About</a>
                      </div>
                    </div>
               </span>

          </div>
          <div class = "content">
                         <div class = "side">
                              <form method = "GET" action = "index.php">
                                   <input type = "text" id = "search" name = "searchQuery" placeholder="Search"><br>
                              </form>
                              <?php
                              include 'includes/sidetile.inc.php';
                              ?>
                         </div>
          <?php
          require 'includes/userposts.inc.php';
          ?>
          <div class = "footer">
          </div>
     </body>
</html>
