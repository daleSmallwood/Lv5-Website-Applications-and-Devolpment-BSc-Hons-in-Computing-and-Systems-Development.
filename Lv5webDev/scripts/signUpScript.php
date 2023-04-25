<?php
require_once("../scripts/dbConn.php");
$username = $_POST["username"];
$password = $_POST["password"];
$rePassword = $_POST["repassword"];

// echo $username . "" . $password . "" .$rePassword ;
if($_SESSION['LoggedIn']==true)
{
  $_SESSION['message']="You are already logged in";
  header('Location: ../webpages/musflixHome.php');

}
if($password !=$rePassword)
{
  $_SESSION['message']="Your passwords do not match";
  header('Location: ../webpages/signUp.php');
}

// $password = password_hash($password, PASSWORD_DEFAULT);
  // echo $password;
$stmt = $conn->prepare("SELECT username FROM userstbl WHERE username = ?");
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($dbUsername);
$stmt->fetch();
if ($username==$dbUsername)
{
    $_SESSION['message']="That username already exists, please pick another";
    $stmt->close();
    header('Location: ../webpages/signUp.php');
}

$stmt->prepare("INSERT INTO userstbl(username, password) VALUES(?,?)");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->close();

$_SESSION['message']="you have now created an account welcome $username please login";
header('location: ../webpages/musflixHome.php');


 ?>
