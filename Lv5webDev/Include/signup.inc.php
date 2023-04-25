<?php

if (isset($_POST["SignUpButton"])){

  $FirstName = $_POST["firstName"];
  $LastName = $_POST["lastName"];
  $Username = $_POST["Username"];
  $Password = $_POST["Password"];
  $Email = $_POST["Email"];

  require_once 'databasehandler.inc.php';
  require_once 'function.inc.php';

//if any of these errors happen it will return the user to the sign up page
  if (emptyInputSignup($FirstName, $LastName, $Username, $Password, $Email)!== false) {
    header("location: ../Pages/Home.php?error=emptyinput");
    exit();
  }
  if (invalidUserid($Username)!== false) {
    header("location: ../Pages/Home.php?error=InvalidUsername");
    exit();
  }
  if (invalidEmail($Email)!== false) {
    header("location: ../Pages/Home.php?error=InvalidEmail");
    exit();
  }
  //check if the user name is already in use
  if (userExists($conn, $Username, $Email)!== false) {
    header("location: ../Pages/Home.php?error=UserTaken");
    exit();
  }
//if there are no errors send data to the database
  createUser($conn, $FirstName, $LastName, $Username, $Password, $Email);

}
else {
  header("location: ../Pages/Home.php");
  exit();
}

 ?>
