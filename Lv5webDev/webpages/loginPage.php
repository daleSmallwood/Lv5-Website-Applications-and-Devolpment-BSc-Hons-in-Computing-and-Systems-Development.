  <?php
  require_once("../scripts/dbConn.php");

//var is test, this test brings out text by using echo
// $test = "hello world";

// echo $test
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../Css/loginStyle.CSS">
    <meta charset="utf-8">
    <title>Login</title>
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
    <div class="LoginStatusContainer">
      <h2>Welcome to MusFlix</h2>
      <p>Please input infomation below</p>

      <form action="../scripts/loginScript.php"  method="post">
        <label class="usernameLable">Username:</label>
        <input class="loginUserbox" type="text" name="username" placeholder="Username"minlength="1"><br>

        <label class="loginLable">Password:</label>
        <input class="loginPassbox" required type="password" name="password" placeholder="Password" minlength="5"><br>
        <input class="loginButton" type="submit">
      </form>
    </div>




<?php
        echo $_SESSION['message'];
        $_SESSION['message'] = "";

?>
  </body>

</html>



<!-- Displays footer -->
<?php require_once("Footer.php");  ?>
