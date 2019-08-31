<?php
if(!isset($_SESSION['username']) && !isset($_POST['viewposts'])){
     header("Location: http://localhost/Interact");
     exit();
}
else{
     require 'connectdb.inc.php';
     $username = $_SESSION['username'];
     $sql = "SELECT * FROM posts WHERE author='$username' ORDER BY published DESC";
     $result = mysqli_query($conn, $sql);
     if(!$result || mysqli_num_rows($result) == 0){
          echo "No Posts Submitted by You!!";
     }
     else{
          while($rows = mysqli_fetch_assoc($result)){
               echo "
               <div class = 'tile'>"
               .$rows['title']."<br>
               <span style='font-size:12px'>Author: ".$rows['author']."</span>
               <p class = 'content'>"
               .$rows['content']."
               </p><br>
               <span style ='font-size:12px'>Published On: ".$rows['published']."</span>
               </div>
               ";
               }
          }
}
?>
