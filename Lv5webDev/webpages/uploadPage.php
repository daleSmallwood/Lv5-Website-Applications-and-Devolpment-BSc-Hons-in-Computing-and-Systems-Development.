  <?php
  require_once("../scripts/dbConn.php");

if($_SESSION['privLV']!==1)
{
$_SESSION['message'] = "You do not have acess to this page";
header('location: loginPage.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../Css/uploadStyle.css">
    <meta charset="utf-8">
    <title>Upload page</title>
  </head>
  <body class="MusflixBody">
    <?php require_once("Nav.php"); ?>
    <img class="CompanyLogo" src="../Images/MusFlixLogo.PNG"alt="Image not found"></img>

  <div class="uploadContainer">
    <form action="../scripts/videoUpScript.php" method="post" enctype="multipart/form-data">
    <p class="uploadText">Please enter a video Name:</p><input type="text" name="vidName"><br><br>
    <p class="uploadText">Please enter a description:</p><input type="text" name="vidDesc"><br><br>
    <p class="uploadText">Upload your video here:</p><input type="file" name="vidFile"><br><br>
    <p class="uploadText">Upload your thumnail:</p> <input type="file" name="thumbnail"><br><br>
      <input class="uploadButton" type="submit">
    </form>
    <?php
      echo $_SESSION['message'];
      $_SESSION['message'] ="";

     ?>
  </div>




 <!-- Displays footer -->
 <?php require_once("Footer.php");  ?>
  </body>
</html>
