 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
session_start();
if(isset($_SESSION['user'])&&$_SESSION['user']==$_POST['user'])
	$user=$_SESSION['user'];
else $user="anonymous";
$conn=new mysqli($servername,$username,$password,$dname);

$sql="INSERT INTO comment (CID,UID,AID,TEXT) VALUES (UUID(),'".$user."','".$_POST['aid']."','".htmlspecialchars($_POST['txt'],$flags=ENT_QUOTES|ENT_HTML5)."')";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($conn->query($sql)==TRUE)
echo "Comment added";
else {echo "Comment <b>not</b> added<br>";
	 }
     
$conn->close();
echo "Connected successfully";

?> 