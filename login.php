<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
     <head>
          <meta charset="utf-8">
          <meta description = "Interact - Login">
          <link rel = "stylesheet" href = "style.css">
          <title>Interact</title>
     </head>
     <body>
          <div class = "header">
               <span class = "logo"><b><a class = "home" href = "index.php">Interact</a></b></span>
               <form method="post">
               <span class = "log-button">
                    <button name = "sign-up" type = "submit" formaction="signup.php">Sign Up</button>
               </span>
               </form>
          </div>
          <div class = "content">
               <div id = "form-box">
                    <div id = "title">Login</div>
                    <div id = "message">
                         <?php
                         if(isset($_GET['err'])){
                              $errortype = $_GET['err'];
                              if($errortype == 'emptyfield'){
                                   echo "All Fields are Mandatory";
                              }
                              elseif($errortype == 'invalidemail'){
                                   echo "Enter Valid Email";
                              }
                              elseif($errortype == 'dberror'){
                                   echo "Error Connecting to Database";
                              }
                              elseif($errortype == 'nouser'){
                                   echo "User not found";
                              }
                              elseif($errortype == 'wrongpwd'){
                                   echo "Incorrect Password";
                              }
                         }
                         function returnField($errortype){
                              if($errortype == 'emptyfield'){
                                   echo $_GET['email'];
                              }
                         }
                         ?>
                    </div>
                    <form name = "login-user" action = "includes/login.inc.php" method="post">
                         <input type = "text" name = "email" placeholder="Email.." value = "<?php
                         if(isset($_GET['err'])){returnField($errortype);} ?>"><br><br>
                         <input type = "password" name = "pwd" placeholder="Password.."><br><br>
                         <button type = "submit" name = "login-user">Login</button>
                    </form>
               </div>
          </div>
          <div class = "footer">
          </div>
     </body>
</html>
