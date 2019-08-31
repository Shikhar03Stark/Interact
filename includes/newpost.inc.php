<?php
if(isset($_POST['publish'])){
     $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
     $content = filter_var($_POST['data'], FILTER_SANITIZE_STRING);
     if(empty($_POST['title']) || empty($_POST['data'])){
          header("Location: http://localhost/Interact/newpost.php?err=emptyfield");
          exit();
     }
     elseif(strlen($title) > 50){
          header("Location: http://localhost/Interact/newpost.php?err=longtitle");
          exit();
     }
     elseif(strlen($content) > 140){
          header("Location: http://localhost/Interact/newpost.php?err=longcontent");
          exit();
     }

     require 'connectdb.inc.php';

     $sql = "INSERT INTO posts (author, keywords, title, content, published) VALUES (? , 'true', ?, ?, CURRENT_TIMESTAMP())";
     $stmt = mysqli_stmt_init($conn);
     if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: http://localhost/Interact/newpost.php?err=dberror");
          exit();
     }
     else{
          session_start();
          mysqli_stmt_bind_param($stmt, "sss", $_SESSION['username'], $title, $content);
          mysqli_stmt_execute($stmt);
          header("Location: http://localhost/Interact/index.php?post=success");
          exit();
     }
     mysqli_close($conn);
}else{
     header("Location: http://localhost/Interact/index.php?post=discard");
     exit();
}
?>
