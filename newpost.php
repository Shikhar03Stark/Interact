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
          <script>
          function lettercount(data){
               data.toString();
               var letters = data.length;
               if(letters <= 140){
               document.getElementById('letter').innerHTML = letters;
               document.getElementById('letter').style.color = "#FFFFFF";
               }
               else{
               document.getElementById('letter').innerHTML = letters;
               document.getElementById('letter').style.color = "red";
               }
          }
          </script>
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
                              New Public POST <hr width = '50%'>
                              <form method = 'post' action = 'includes/newpost.inc.php' name = 'post-form'>
                                   <button name = 'publish'>Publish Post</button> &nbsp;&nbsp;
                                   <button name = 'quit' style = 'background:#FF5252'>Discard Post</button>
                         </div>
          <div class = 'tile'>
                    <div id = 'message' style="width:90%; text-align:center;">
                         <?php
                         if(isset($_GET['err'])){
                              if($_GET['err'] == 'emptyfield'){
                                   echo 'All fields Are Mandatory';
                              }
                              elseif($_GET['err'] == 'longtitle'){
                                   echo 'Title Must be Less than 50 Characters';
                              }
                              elseif($_GET['err'] == 'longcontent'){
                                   echo 'POST Must be Less than 140 Characters';
                              }
                              elseif($_GET['err'] == 'dberror'){
                                   echo 'Error Connecting to Database';
                              }
                         }
                         ?>
                    </div>
                    <input type = "text" name = 'title' id= 'post-title' placeholder="Title"><br><hr width = '50%'>
                    <textarea name = 'data' id = 'post-content' placeholder="POST Content" oninput="lettercount(this.value);"></textarea>
               </form>
               <p class="content">
                    <br>Character(s): <span id = 'letter'>0</span>/140.
               </p>
          </div>
          <div class = "footer">
          </div>
     </body>
</html>
