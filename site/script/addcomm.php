 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
session_start();
// Create connection
//$conn = new mysqli($servername,$username,$password,$dname);
$conn=new mysqli($servername,$username,$password,$dname);
//echo $_GET['user'];
//echo $_GET['txt'];
$sql="INSERT INTO comment (CID,UID,AID,TEXT) VALUES (UUID(),'".$_GET['user']."','".$_GET['aid']."','".htmlspecialchars($_GET['txt'],$flags=ENT_QUOTES|ENT_HTML5)."')";

//echo $sql;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($conn->query($sql)==TRUE)
echo "Comment added";
else {echo "Comment <b>not</b> added<br>";
     //echo "Error: " . $sql . "<br>" . $conn->error."<br>";
	 }
     
$conn->close();
echo "Connected successfully";

?> 