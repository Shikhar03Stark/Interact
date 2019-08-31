<?php
session_start();
session_destroy();
header("Location: http://localhost/Interact/index.php");
exit();
?>
