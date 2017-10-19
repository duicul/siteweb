 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
// Create connection
session_start();
//$conn = new mysqli($servername,$username,$password,$dname);
$conn=new mysqli($servername,$username,$password,$dname);
echo $_GET['cid'];
$admin=0;
if(isset($_SESSION['user']))
{$sql="SELECT * FROM user WHERE USERNAME='".$_SESSION['user']."'";
// Check connection
echo $sql;
 
//0-name 1-username 2-password 3-mail
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
    if($result)
	{$row=mysqli_fetch_assoc($result);
     $admin=$row['ADMIN'];
	}
}

$sql="SELECT * FROM comment WHERE CID='".$_GET['cid']."'";
// Check connection
echo $sql;
//0-name 1-username 2-password 3-mail
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
    if($result)
	{$row=mysqli_fetch_assoc($result);
    if(isset($_SESSION['user'])&&($row['UID']==$_SESSION['user']||$admin==1))
	{$sql="DELETE FROM comment WHERE CID='".$_GET['cid']."'";
echo $sql;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($conn->query($sql)==TRUE)
echo "Comment rem";
else {echo "Comment <b>not</b> rem<br>";
     echo "Error: " . $sql . "<br>" . $conn->error."<br>";}
   
$conn->close();
echo "Connected successfully";
	}}
?> 