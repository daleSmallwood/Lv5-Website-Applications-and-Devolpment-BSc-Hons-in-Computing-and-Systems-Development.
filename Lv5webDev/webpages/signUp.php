<?php
require_once ("../scripts/dbConn.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <link href='../Css/signUpStyle.css' rel="stylesheet">
  <head>
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X-UA-compatible" content="ie=edge">
    <meta charset="utf-8">

	<title>Sign Up</title>

  </head>
  <body class="MusflixBody">
    <?php require_once("Nav.php"); ?>


    <!-- to view this site plase use http://localhost/Musflixs/pages/SignUp.php-->

  <img class="CompanyLogo" src="../Images/MusFlixLogo.PNG"alt="Image not found"></img>

  <!--image obtained from https://www.freelogodesign.org/manager/showcase/09e4804328284635949d80c0b1d6ebb6 -->

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

<div class="SignUpStatusContainer">
  <h2>Welcome to MusFlix</h2>
  <p>Please input infomation below</p>
    <div class="SignupButtons">
      <form action="../scripts/signUpScript.php" class="SignUpInput" method="post">
        <label>Sign up</label>
        <!-- <input type="text" name="firstName" placeholder="Type your First name here."minlength="1" required><br>
        <input type="text" name="lastName" placeholder="Type your Last name here."minlength="1" required><br> -->
        <input type="text" name="email" placeholder="Type your Email here."minlength="1" required value="<?php echo $_POST["dudEmail"];  ?>"><br>
        <input type="text" name="username" placeholder="Type your Username here." minlength="1" required ><br>
        <input type="Password" name="password" placeholder="Type your Password here (must be 5 or more characters)." minlength="5" Required ><br>
        <input type="Password" name="repassword" placeholder="Type your Password here (must be 5 or more characters)." minlength="5" Required ><br>

         <button  type="submit" name="submit" class="SignUpButton">Submit<a></button>
         </form>
 <?php
echo $_SESSION['message'];

  ?>
    </div>
</div>





<script>
function Login() {
  confirm("Press ok to contuine");
}
</script>
</div>


</body>


<!-- Displays footer -->
<?php require_once("Footer.php");  ?>

</html>
