 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
$conn=new mysqli($servername,$username,$password,$dname);
echo $_POST['user'];
echo $_POST['password'];
echo $_POST['name'];
echo $_POST['mail'];

if (!isset($_POST['admin']))
$aux=0;
else $aux=$_POST['admin'];
$password=hash('sha3-512',$_POST['password']);
echo $password."<br>".strlen($password);
$sql="INSERT INTO user (NAME,USERNAME,PASSWORD,MAIL,ADMIN) VALUES ('".$_POST['name']."','".$_POST['user']."','".$password."','".$_POST['mail']."',".$aux.")";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
if($conn->query($sql)==TRUE)
echo "User added";
else {echo "User <b>not</b> added<br>";
     echo "Error: " . $sql . "<br>" . $conn->error."<br>";}
$conn->close();
echo "Connected successfully";
?> 