<?php
if(isset($_POST["login-user"])){
require 'connectdb.inc.php';
$email = $_POST["email"];
$pwd = $_POST["pwd"];

if(empty($email) || empty($pwd)){
     header("Location: http://localhost/Interact/login.php?err=emptyfield&email=".$email);
     exit();
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     header("Location: http://localhost/Interact/login.php?err=invalidemail");
     exit();
}
else{
     //prepared statement for cheching user
     $sql = "SELECT * FROM users WHERE email=?";
     $stmt = mysqli_stmt_init($conn);
     if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: http://localhost/Interact/login.php?err=dberror");
          exit();
     }
     else{
          mysqli_stmt_bind_param($stmt, "s", $email);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if($row = mysqli_fetch_assoc($result)){
               //built-in function that hashes the password and returns true if matches with db
               $passwordCheck = password_verify($pwd, $row['pwd']);
               if(!$passwordCheck){
                    header("Location: http://localhost/Interact/login.php?err=wrongpwd");
                    exit();
               }
               else{
                    //user is verified and ready to be logged in
                    session_start();
                    $_SESSION['username'] = $row["username"];
                    $_SESSION['id'] = $row["id"];

                    header("Location: http://localhost/Interact/index.php?login=success");
                    exit();
               }
          }
          else{
               header("Location: http://localhost/Interact/login.php?err=nouser");
               exit();
          }
     }
}

}else{
     header("Location: http://localhost/Interact");
     exit();
}
?>
