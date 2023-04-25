<?php
require_once("dbinit.php");
 session_start();
 // connect to database
 $conn = new mysqli(Host, Username, Password, Database);
 // if there is an error, stop connection and print error
 if($conn->connect_error)
 {
   die("Connection Failed: " . $conn->connect_error);
 }
 // initialise session vars for the database
 if(!isset($_SESSION['LoggedIn']))
{
  $_SESSION["userID"]="";
  $_SESSION["username"]="";
  $_SESSION["privLV"]="";
  $_SESSION["LoggedIn"]=false;
  $_SESSION["message"]="";
}
