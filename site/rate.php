 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
session_start();
// Create connection
//$conn = new mysqli($servername,$username,$password,$dname);
if(isset($_SESSION['user']))
{$conn=new mysqli($servername,$username,$password,$dname);
echo $_GET['val'];
echo $_GET['aid'];
 
$sql="SELECT * FROM vote WHERE UID='".$_SESSION['user']."' AND AID=".$_GET['aid'];
echo $sql;  
if ($conn->connect_error) {
	echo "connect eror <br>";
    die("Connection failed: " . $conn->connect_error);
	
}
 echo "a";
 $result=$conn->query($sql);
 echo "b";
if($result=$conn->query($sql))
{ echo "pass";
if($result->num_rows>0)
{echo "update<br>";
$sql="UPDATE vote SET SCORE='".$_GET['val']."' WHERE UID='".$_SESSION['user']."' AND AID='".$_GET['aid']."'";	
echo $sql;
 if($conn->query($sql)==TRUE)
echo "update";
 else "not updated";
}
else
{$sql="INSERT INTO vote (UID,AID,SCORE) VALUES ('".$_SESSION['user']."','".$_GET['aid']."','".$_GET['val']."')";

echo $sql;

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