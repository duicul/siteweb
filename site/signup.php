 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";

// Create connection
//$conn = new mysqli($servername,$username,$password,$dname);
$conn=new mysqli($servername,$username,$password,$dname);
echo $_POST['user'];
echo $_POST['password'];
echo $_POST['name'];
echo $_POST['mail'];

if (!isset($_POST['admin']))
$aux="0";
else $aux=$_POST['admin'];

$sql="INSERT INTO user (NAME,USERNAME,PASSWORD,MAIL,ADMIN) VALUES ('".$_GET['name']."','".$_POST['user']."','".$_POST['password']."','".$_POST['mail']."',".$aux.")";
// Check connection
echo $sql;
//0-name 1-username 2-password 3-mail
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($conn->query($sql)==TRUE)
echo "User added";
else {echo "User <b>not</b> added<br>";
     echo "Error: " . $sql . "<br>" . $conn->error."<br>";}
   
$conn->close();
echo "Connected successfully";
header('Location: '.$uri.'/site/');
?> 