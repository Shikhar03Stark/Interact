<?php
//connecting to Database
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "Interact";

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
if(!$conn){
     die("Error Accessing Database ");
}
?>
