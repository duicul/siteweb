 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";

// Create connection
//$conn = new mysqli($servername,$username,$password,$dname);
$conn=new mysqli($servername,$username,$password,$dname);
$sql="SELECT * FROM mainpage WHERE TYPE!=1";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	$rows = mysqli_fetch_all($result);
	if(isset($_SESSION['user']))
		$aux=$_SESSION['user'];
	else $aux='anonymous';
	foreach($rows as $row)
{echo "<span style=\"font-size:2rem\" class=\"point\" onClick=\"maindel('".$row[0]."')\" >".$row[1]."<i  class=\"fa fa-times\"></i></span><br>";
}
?>