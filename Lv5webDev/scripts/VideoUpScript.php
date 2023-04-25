<?php
require_once("../scripts/dbConn.php");

if($_SESSION['privLV']!==1)
{
  $_SESSION['message'] = "You do not have the right level to enter";
  header('location: loginPage.php');
}
//Location of the videos
$vidTarget_dir="../videos/";
$thumbTarget_dir="../images";

//fetch through the names and files from the upload page
$vidName=$_POST["vidName"];
$vidDesc=$_POST["vidDesc"];
$vidFile=$_FILES["vidFile"]["name"];
$thumbFile=$_FILES["thumbnail"]["name"];
// set destination of the files
$vidTarget = $vidTarget_dir . $vidFile;
$thumbTarget= $thumbTarget_dir . $thumbFile;
$vidFileType=pathinfo($videoTarget, PATHINFO_EXTENSION);
$thumbFileType=pathinfo($thumbTarget, PATHINFO_EXTENSION);


// echo $vidName . " " . $vidDesc . " " . $vidFile;

if (!empty($thumbFile))
{



if(move_uploaded_file($_FILES["vidFile"]["tmp_name"], $vidTarget))
{
  if(move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $thumbTarget))
{
    $stmt = $conn->prepare("INSERT INTO videoTbl(vName, vDesc, vPath, vThumb, userID) VALUES(?,?,?,?,?)");
    $stmt->bind_param("ssssi", $vidName, $vidDesc, $vidTarget, $thumbTarget, $_SESSION["userID"]);
    $stmt->execute();
    $stmt->close();
    $_SESSION["message"]="The video was uploaded successfully!!";
    header('location: ../webpages/uploadPage.php');
  }
  else
  {
    $_SESSION["message"]="There was an error uploading the thumnail";
    header('location: ../webpages/uploadPage.php');
  }
}
else
{
  $_SESSION["message"]="There was an error uploading the video";
  header('location: ../webpages/uploadPage.php');
}
}
else
{
  if(move_uploaded_file($_FILES["vidFile"]["tmp_name"], $vidTarget))
{
    $stmt = $conn->prepare("INSERT INTO videoTbl(vName, vDesc, vPath, userID) VALUES(?,?,?,?)");
    $stmt->bind_param("sssi", $vidName, $vidDesc, $vidTarget, $_SESSION["userID"]);
    $stmt->execute();
    $stmt->close();
    $_SESSION["message"]="The video was uploaded successfully!!";
    header('location: ../webpages/uploadPage.php');
  }
  else
  {
    $_SESSION["message"]="There was an error uploading the video";
    header('location: ../webpages/uploadPage.php');
  }

}
?>
