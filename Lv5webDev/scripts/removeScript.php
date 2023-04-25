<?php
require_once("../scripts/dbConn.php");

if($_SESSION['privLV']!==1)
{
$_SESSION['message'] = "You do not have acess to this page";
header('location: loginPage.php');
}

$videoID=$_GET["vID"];

$stmt = $conn->prepare("SELECT vPath, vThumb FROM videoTbl WHERE videoID=?");
$stmt->bind_param("i", $videoID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($vPath ,  $vThumb);
$stmt->fetch();
$stmt->close();

unlink($vPath);
if($vThumb !="../images/placeholder.png")
{
unlink($vThumb);
}

$stmt = $conn->prepare("DELETE FROM videoTbl WHERE videoID=?");
$stmt-> bind_param('i', $videoID);
$stmt-> execute();
$stmt-> close();

$_SESSION['message']="Video removed";
header("location: ../webpages/Home1.php");
?>
