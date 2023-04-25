<?php
require_once("../scripts/dbConn.php");
$videoID = $_GET['vID'];
$stmt = $conn->prepare("SELECT * FROM videoTbl WHERE videoID=?");
$stmt->bind_param("i", $videoID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($VidIDdb, $vName, $vDesc, $vPath, $vThumb, $userIDdb, $uploadDate, $views);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../Css/viewStyle.css">
    <meta charset="utf-8">
    <title><?php echo $vName; ?></title>
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



    <div  class="main">
      <div class="video">
        <video controls src="<?php echo $vPath; ?>"></video>
      </div>
      <div class="details">
        <div class="vName">
          <?php echo $vName; ?>
        </div>

            <div class="vDesc">
              <?php echo $vDesc; ?>
            </div>
      </div>
      <?php
      if($_SESSION['privLV']==1)
      {
      echo "<a href='../scripts/removeScript.php?vID=$videoID'>DELETE VIDEO</a>";
      }
      ?>
    </div>


    <!-- Displays footer -->
    <?php require_once("Footer.php");  ?>
  </body>
</html>
