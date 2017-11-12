 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
session_start();
if(isset($_SESSION['user']))
{$conn=new mysqli($servername,$username,$password,$dname);
echo $_GET['val'];
echo $_GET['aid'];
$sql="SELECT * FROM vote WHERE UID='".$_SESSION['user']."' AND AID='".$_GET['aid']."'";
if ($conn->connect_error) {
	echo "connect eror <br>";
    die("Connection failed: " . $conn->connect_error);
}
 $result=$conn->query($sql);
if($result)
{if($result->num_rows>0)
{$sql="UPDATE vote SET SCORE='".$_GET['val']."' WHERE UID='".$_SESSION['user']."' AND AID='".$_GET['aid']."'";	
 if($conn->query($sql)==TRUE)
 { }
 else {}
}
else
{$sql="INSERT INTO vote (UID,AID,SCORE) VALUES ('".$_SESSION['user']."','".$_GET['aid']."','".$_GET['val']."')";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($conn->query($sql)==TRUE)
echo "Comment added";
else {echo "Comment <b>not</b> added<br>";
     echo "Error: " . $sql . "<br>" . $conn->error."<br>";}
echo "Connected successfully";
}}}
$conn->close();
?> 