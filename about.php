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
                    About<br>
                    <p class = 'content'>
                         I created this website using PHP, HTML, CSS.<br>
                         My future plans are integrating AJAX and Create Even more Dynamic Website.<br>
                         Created By Shikhar Vishwakarma as a Personal Project.<br>
                    </p>
               </div>
               <div class='tile'>
                    Aim of Website<br>
                    <p class = 'content'>
                         Connect people accros a LAN (or even MAN !)<br>
                         Have functionality like<br>
                         <ul type = "disc">
                              <li>Like Posts</li>
                              <li>Add Comments to Posts</li>
                              <li>Add profile Picture</li>
                              <li>Create Posts(may involve various kind of media)</li>
                              <li>Ability to Delect Account</li>
                              <li>Even More...</li>
                         </ul>
                    </p>
               </div>
          </div>
          <div class = "footer">
          </div>
     </body>
</html>
