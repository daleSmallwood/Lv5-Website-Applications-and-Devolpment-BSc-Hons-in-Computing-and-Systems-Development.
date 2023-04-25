<?php
require_once("../scripts/dbConn.php");

//var is test, this test brings out text by using echo
// $test = "hello world";

// echo $test
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" href="../Css/adminStyle.css">
  <meta charset="utf-8">
  <title>Admin page</title>
</head>
<body class="MusflixBody">
  <?php require_once("Nav.php"); ?>

  <img class="CompanyLogo" src="../Images/MusFlixLogo.PNG"alt="Image not found"></img>
  <!--This displays if the user is not logged in-->
<?php
if($_SESSION['LoggedIn']==false)
{
echo "<div class='Login'><a href='loginPage.php'><b>Login</b></a></div>";
}
else
{
echo "<div class='Login'><a href='../scripts/logoutScript.php'><b>Log Out</b></a></div>";
}
?>

  <!-- form that inputs login details and directs to file requested -->
  <div class="StatusContainer">
    <h2>Welcome admin what do you require?</h2>
    <p>Please select below</p>
    <?php
          echo $_SESSION['message'];
          $_SESSION['message'] = "";

    ?>
    <a class="uploadButton" href="uploadPage.php">Upload files</a>

  </div>





</body>

</html>

<?php
require_once("Footer.php");
?>
