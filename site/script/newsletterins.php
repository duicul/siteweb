 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
{$conn=new mysqli($servername,$username,$password,$dname);
if(isset($_POST['name'])&&isset($_POST['mail']))
{$sql="INSERT INTO newsletter (NAME,MAIL) VALUES ('".$_POST['name']."','".$_POST['mail']."')";
// 'Check connection
echo $sql;
//0-name 1-username 2-password 3-mail
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($conn->query($sql)==TRUE)
echo "User added";
 
$conn->close();
echo "Connected successfully";}
}
?> 