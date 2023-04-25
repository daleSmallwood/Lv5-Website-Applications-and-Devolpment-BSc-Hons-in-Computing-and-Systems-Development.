<?php
//Checks for any missing infomation
function emptyInputSignup($FirstName, $LastName, $Username, $Password, $Email){
  $result;
  if (empty($FirstName)|| empty($LastName)||  empty($Username)||  empty($Password)||  empty($Email)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}

function invalidUserid($Username){
  $result;
  //peramiter to check if any of these keys are used inside the username
  if (!preg_match("/^[a-zA-Z0-9]*$/", $Username)) {
  $result = true;
    }
  else {
    $result = false;
  }
  return $result;
}


function invalidEmail($Email){
  $result;
  //Checks if the email is correct
  if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
  $result = true;
    }
  else {
    $result = false;
  }
  return $result;
}
//check if the user name is already in use
function userExists($conn, $Username, $Email){
  $sql = "SELECT * FROM users WHERE userid = ? OR usersEmail = ?;";
//This is to prevent unwanted code being added to the database
  $stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $Username, $Email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}

//this function adds the user to the database
function createUser($conn, $FirstName, $LastName, $Username, $Password, $Email){
  $sql = "INSERT INTO users (usersFirstName, usersLastName, usersEmail,	usersUsername, usersPassword) VALUES (?,?,?,?,?); ";

  $stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  $scramblePassword = password_hash($Password, PASSOWRD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sssss",  $FirstName, $LastName, $Username, $scramblePassword, $Email);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location:../signup.php?error=none");
  exit();
}




 ?>
