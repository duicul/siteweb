 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
if(isset($_SESSION['user']))
{$conn=new mysqli($servername,$username,$password,$dname);
$sql="SELECT * FROM user WHERE USERNAME='".$_SESSION['user']."'";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 else
 {$result = $conn->query($sql);
if($result)
{$row = mysqli_fetch_assoc($result);
if(sizeof($row)==0||$row['ADMIN']==0)
{}
else
{print_r($row);
 $sql="DELETE FROM article WHERE ID='".$_GET['aid']."'";
 echo $sql;
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
 
 
}}}}
$conn->close();
echo "Connected successfully";
?> 