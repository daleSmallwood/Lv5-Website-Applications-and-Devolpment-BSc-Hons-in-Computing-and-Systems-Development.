<?php
require_once("../scripts/dbConn.php");
session_destroy();
session_start();
$_SESSION['message']="You have been logged out";
header("Location: ../webpages/musflixHome.php");
 ?>
