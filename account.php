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
          <meta description = "Interact - About">
          <link rel = "stylesheet" href = "style.css">
          <title>Interact</title>
     </head>
     <body>
          <div class = "header">
               <span class = "logo"><b><a class = "home" href = "index.php">Interact</a></b></span>
               <form method="post">
               <span class = "log-button">
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
                    <?php
                    include 'includes/sidetile.inc.php';
                    ?>
               </div>

               <div class = "tile">
                    Account Setting<br><hr width = '50%'>
                    <p><b>Delete My Posts</b></p>
                    <form method= "POST" action = "myposts.php">
                         <button name = 'viewposts'>View My Posts</button>
                    </form>
                    <hr width = '50%'>
                    <p><b>Delete My Account: </b></p>
                    <form method= "POST" action = "includes/deleteaccount.inc.php">
                         <button name = 'deleteUser' style="background:#ff5252;">Delete My Account Permanently</button>
                    </form>
               </div>

          </div>
          <div class = "footer">
          </div>
     </body>
</html>
