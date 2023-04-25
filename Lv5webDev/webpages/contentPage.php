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
  <link rel="stylesheet" href="../Css/contentStyle.CSS">
  <meta charset="utf-8">
  <title>Content</title>
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
<div id="vidlist">
  <?php
    while ($stmt->fetch())
    {
      echo"
        <div class='vidBox' onclick='location.href=\"../webpages/viewPage.php?vID=$videoID\"'>
          <img src='$vThumb' width='200px' height='200px'>
          <div class='vidName'>
            <h2>$vName</h2>
            Uploaded: $uploadDate
          </div>
        </div>
      ";
    }

   ?>
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




  <div id="vidlist">
    <?php
      while ($stmt->fetch())
      {
        echo"
          <div class='vidBox' onclick='location.href=\"../webpages/viewPage.php?vID=$videoID\"'>
            <img src='$vThumb' width='200px' height='100px'>
            <div class='vidName'>
              <h2>$vName</h2>
              Uploaded: $uploadDate
            </div>
          </div>
        ";
      }

     ?>
  </div>
</body>
</html>
