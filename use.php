<?php
session_start();
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
                    How To Use This Website<br>
                    <p class = 'content'>
                         Use this website to stay in touch of your Friends.<br>
                         <b><i>Don't</i></b> Share any Personal Information like Address, Phone Number
                         or Bank Related Details.<br><b><i>You have been Warned</i></b><br>
                    </p>
               </div>
               <div class='tile'>
                    How to Use it's Functionality<br>
                    <p class = 'content'>
                         <b>Sign Up</b><br>
                         You can Sign up by Clicking on SignUp button.<br><br>
                         <b>Login</b><br>
                         Once you have succesfully SignedUp yourself You can Click on Login Button to
                         Login.<br></br>
                         <b>LogOut</b><br>
                         Once you have succesfully LoggedIn yourself You can Click on LogOut Button to
                         LogOut.<br></br>
                         <b>More Functionality are On the way..</b>
                    </p>
               </div>
          </div>
          <div class = "footer">
          </div>
     </body>
</html>
