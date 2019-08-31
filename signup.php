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
                    <button name = "login" type = "submit" formaction="login.php">Login</button>
               </span>
               </form>
          </div>
          <div class = "content">
               <div id = "form-box">
                    <div id = "title">Sign Up</div>
                    <div id = "message">
                    <?php
                    if(isset($_GET['err'])){
                         $errortype = $_GET['err'];
                         if($errortype == 'emptyfield'){
                              echo "All Fields are Mandatory";
                         }
                         elseif($errortype == 'invalid'){
                              echo "Invalid Username and Email";
                         }
                         elseif($errortype == 'invalidusernm'){
                              echo "Invalid Username";
                         }
                         elseif($errortype == 'invalidemail'){
                              echo "Invalid Email";
                         }
                         elseif($errortype == 'passwordmatch'){
                              echo "Password did not Match";
                         }
                         elseif($errortype == 'dberror'){
                              echo "Error Connecting to Database";
                         }
                         elseif($errortype == 'usrnmtaken'){
                              echo "Username already taken.";
                         }
                         elseif($errortype == 'emailexist'){
                              echo "Email already Exists. <a href = 'login.php'>Login</a>";
                         }
                    }
                    function returnSpeceficField($errortype, $field){
                         if($errortype == 'emptyfield' && $field == 'username'){
                              echo $_GET['usrnm'];
                         }
                         elseif ($errortype == 'emptyfield' && $field == 'email') {
                              echo $_GET['email'];
                         }
                         elseif($errortype == 'invalidusernm' && $field == 'email'){
                              echo $_GET['email'];
                         }
                         elseif($errortype == 'invalidemail' && $field == 'username'){
                              echo $_GET['usrnm'];
                         }
                         elseif($errortype == 'passwordmatch' && $field == 'username'){
                              echo $_GET['usrnm'];
                         }
                         elseif($errortype == 'passwordmatch' && $field == 'email'){
                              echo $_GET['email'];
                         }
                         elseif($errortype == 'usrnmtaken' && $field == 'email'){
                              echo $_GET['email'];
                         }
                    }
                    ?>
                    </div>
                    <form name = "login-user" action = "includes/signup.inc.php" method="post">
                         <input type = "text" name = "username" placeholder="Username.." value =
                         "<?php
                         if(isset($_GET['err'])){
                              returnSpeceficField($errortype, 'username');
                         }
                         ?>"
                         ><br><br>
                         <input type = "text" name = "email" placeholder="Email.." value =
                         "<?php
                         if(isset($_GET['err'])){
                              returnSpeceficField($errortype, 'email');
                         }
                         ?>"><br><br>
                         <input type = "password" name = "pwd" placeholder="Password.."><br><br>
                          <input type = "password" name = "re-pwd" placeholder="ReEnter Password.."><br><br>
                         <button type = "submit" name = "signup-user">Sign Up</button>
                    </form>
               </div>
          </div>
          <div class = "footer">
          </div>
     </body>
</html>
