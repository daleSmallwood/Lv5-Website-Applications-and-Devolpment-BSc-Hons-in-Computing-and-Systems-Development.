  <?php

  require_once("../scripts/dbConn.php");
  // all vars are stored and carry'd across to other files
  // session_start();
//these var's collect infomation from loginpage from
$username = $_POST['username'];
$password = $_POST['password'];

/* displays data
echo $username;
echo $password;
*/
// connect to database
// $conn = new mysqli("localhost", "root", "", "musflixdb");
// if($conn->connect_error)
// {
//   die("Connection Failed: " . $conn->connect_error);
// }
// statment s = string = i = inter = f = floting point number
$stmt = $conn->prepare("SELECT userID, username, password, privLV FROM userstbl WHERE username =?");
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($userID, $dbUsername, $dbPassword,$dbPrivLV);
$stmt->fetch();
$stmt->close();
// tests if data is recived

// echo $dbUsername, "<br>". $dbPassword . "<br>" . $dbPrivLV;

// if any user inputs correct details login to login page
// $password = password_hash($password, PASSWORD_DEFAULT);
echo $password;
echo "<br>";
echo $dbPassword;
if($username == $dbUsername && $password == $dbPassword)
{
  $_SESSION['message']="You have logged in welcome $dbUsername";
  $_SESSION['LoggedIn']=true;
  $_SESSION['privLV']=$dbPrivLV;
  $_SESSION['username']=$dbUsername;
  $_SESSION['userID']=$userID;
  echo "Logged in";
  header('location: ../webpages/AdminPage.php');
}
  else
  {
     $_SESSION['message'] = "invalid username or password";
     echo "Failed";
     header('location: ../webpages/loginPage.php');
  }



?>
