<?php
//if user is signed in
if(isset($_SESSION['username'])){
     $username = $_SESSION['username'];
     echo "Hello $username <br><hr width = '50%'>";
     echo "<a class = 'home' href = 'newpost.php'><b>Create New Public POST</b></a><br><br>";
     echo "<a class = 'home' href = 'account.php'>Account Settings</a><br><br>";

}else{
     echo "Welcome To Interact";
}
?>
