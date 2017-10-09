 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";

// Create connection
//$conn = new mysqli($servername,$username,$password,$dname);
$conn=new mysqli($servername,$username,$password,$dname);
echo $_GET['fname'];
echo $_GET['title'];
echo $_GET['type'];


$sql="INSERT INTO article (FNAME,TITLE,TYPE) VALUES ('".$_GET['fname']."','".$_GET['title']."','".$_GET['type']."')";
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

?> 