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
    echo $user;
   $aux=$_POST['txt'];
   echo $_SERVER["REQUEST_URI"];
$sql="INSERT INTO comment (USERNAME,AID,TYPE,TEXT) VALUES ('".$user."','sport','spo','".$aux."')";
	/*('".$user."','".basename($_SERVER['PHP_SELF'],".php")."','".$_SERVER["REQUEST_URI"]."','".$_POST['txt']."')";*/
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