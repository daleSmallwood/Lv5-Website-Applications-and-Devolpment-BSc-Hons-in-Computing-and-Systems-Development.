  <?php
  require_once("../scripts/dbConn.php");



$stmt = $conn->prepare("SELECT videoID, vName, vThumb, uploadDate FROM videoTbl");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($videoID, $vName, $vThumb, $uploadDate);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../Css/homeStyle.CSS">
    <meta charset="utf-8">
    <title>MusFlix Home</title>
  </head>

  <body class="MusflixBody">
    <?php require_once("Nav.php"); ?>

    <!-- to view this site plase use http://localhost/Lv5webDev/webpages/musflixHome.php-->


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
    <div class="LoginStatusContainer">
      <h2>Welcome to MusFlix</h2>
      <p>You must be new here!<br> Care to sign up?</p>
        <div class="SignupButtons">
          <form class="EmailInput" method="post"action="signUp.php">
            <label>Sign up</label>
             <input id="signupEmail"class="EmailTextbox" type="text" name="dudEmail" placeholder="Type your Email address here." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  min="5"/>
             <input id="signupAccountcheck" class="HomeButton"  type="submit">
          </form>
        </div>
        <h4 class="musflixRemoveText">you can remove your account at anytime.</h4>
        <?php echo $_SESSION['message']; ?>
    </div>





    <script>
    function Login() {
      confirm("Press ok to contuine");
    }
    </script>


    </body>


    <!-- Displays footer -->
    <?php
    require_once("Footer.php");
     ?>


  </body>
</html>
