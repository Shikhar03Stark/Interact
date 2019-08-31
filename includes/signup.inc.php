<?php
if(isset($_POST["signup-user"])){

require 'connectdb.inc.php';

$username = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$repwd = $_POST['re-pwd'];

if(empty($username) || empty($email) || empty($pwd) || empty($repwd)){
     header("Location: http://localhost/Interact/signup.php?err=emptyfield&usrnm=".$username."&email=".$email);
     exit();
}
elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
     header("Location: http://localhost/Interact/signup.php?err=invalid");
     exit();
}
elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
     header("Location: http://localhost/Interact/signup.php?err=invalidusernm&email=".$email);
     exit();
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     header("Location: http://localhost/Interact/signup.php?err=invalidemail&usrnm=".$username);
     exit();
}
elseif($pwd !== $repwd){
     header("Location: http://localhost/Interact/signup.php?err=passwordmatch&usrnm=".$username."&email=".$email);
     exit();
}
//prepared statement for checking same username
$sql = "SELECT username FROM users WHERE username= ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
     header("Location: http://localhost/Interact/signup.php?err=dberror");
     exit();
}else{
     mysqli_stmt_bind_param($stmt, "s", $username);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_store_result($stmt);
     $resultCheck = mysqli_stmt_num_rows($stmt);
     if($resultCheck > 0){
          header("Location: http://localhost/Interact/signup.php?err=usrnmtaken");
          exit();
     }
}
//prepared statement for checking same email
$sql = "SELECT email FROM users WHERE email= ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
     header("Location: http://localhost/Interact/signup.php?err=dberror");
     exit();
}else{
     mysqli_stmt_bind_param($stmt, "s", $email);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_store_result($stmt);
     $resultCheck = mysqli_stmt_num_rows($stmt);
     if($resultCheck > 0){
          header("Location: http://localhost/Interact/signup.php?err=emailexist");
          exit();
     }
}
$sql = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
     header("Location: http://localhost/Interact/signup.php?err=dberror");
     exit();
}
else{
     //hash passwords
     $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

     mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
     mysqli_stmt_execute($stmt);
     header("Location: http://localhost/Interact/login.php?signup=success");
     exit();
}
mysqli_close($conn);
}
else{
     header("Location: http://localhost/Interact");
     exit();
}
?>
