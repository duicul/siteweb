 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
session_start();
// Create connection
//$conn = new mysqli($servername,$username,$password,$dname);
$conn=new mysqli($servername,$username,$password,$dname);
if(isset($_SESSION['user']))
{$user=$_SESSION['user'];}
else {$user="anonymous";}
	echo $_POST['txt'];
    echo $_POST['user'];
   echo $_SERVER["REQUEST_URI"];
$$sql="INSERT INTO user (UID,AID,TYPE,TEXT) VALUES ('".$user."','".basename($_SERVER['PHP_SELF'],".html")."','".$_SERVER["REQUEST_URI"]."','".$_POST['txt']."',".$aux.")";
echo $sql;
//0-name 1-username 2-password 3-mail
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($conn->query($sql)==TRUE)
echo "Comment added";
else {echo "Comment <b>not</b> added<br>";
     echo "Error: " . $sql . "<br>" . $conn->error."<br>";}
   
$conn->close();
echo "Connected successfully";

?> 