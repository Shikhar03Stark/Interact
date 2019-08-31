
     <?php
     if(isset($_GET['searchQuery'])){
          echo "<div class = 'tile'>Search Result for:(Not Functional YET) <b>".$_GET['searchQuery']."<b><br></div>";
     }
     ?>

<?php
if(isset($_SESSION['username'])){
     if(!isset($_GET['searchQuery'])){
          require 'connectdb.inc.php';

          $sql = "SELECT * FROM posts ORDER BY published DESC";
          $result = mysqli_query($conn, $sql);
          if(!$result || mysqli_num_rows($result) == 0){
               echo "No Public POSTS Yet!";
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
     }
else{
  echo "
    <div class = 'tile'>
    <p class = 'content' style = 'font-size:34px'> Welcome To The Open Community of Internet <b>INTERACT</b></p><br><br>
    <p class = 'content'>Be Nice. Be Respectful.</p>
    </div>
  ";
  }
?>
