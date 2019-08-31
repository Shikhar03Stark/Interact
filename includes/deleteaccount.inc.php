<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_POST['deleteUser'])){
     header("Location: http://localhost/Interact/index.php");
     exit();
}
else{
     require 'connectdb.inc.php';
     $sql = "SELECT * FROM users WHERE username=? AND id=?";
     $stmt = mysqli_stmt_init($conn);
     if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: http://localhost/Interact/index.php?err=dberror");
          exit();
     }
     else{
          mysqli_stmt_bind_param($stmt, 'si', $_SESSION['username'], $_SESSION['id']);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $resultCheck = mysqli_stmt_num_rows($stmt);
          if($resultCheck > 0){
               $str = "DELETE FROM users WHERE id=".$_SESSION['id'];
               mysqli_query($conn, $str);
               session_destroy();
               header("Location: http://localhost/Interact/index.php");
               exit();
          }else{
               header("Location: http://localhost/Interact/index.php?err=delerror");
               exit();
          }
     }
}
?>
