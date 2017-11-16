 <?php
if(session_status()==PHP_SESSION_NONE)
{session_start();}
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
$conn=new mysqli($servername,$username,$password,$dname);
if($_GET['tip']==1)
	$cond="";
else $cond="WHERE TYPE=".$_GET['tip'];
$sql="SELECT * FROM article ".$cond;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	$rows = mysqli_fetch_all($result);
	if(isset($_SESSION['user']))
		$aux=$_SESSION['user'];
	else $aux='anonymous';
	foreach($rows as $row)
{echo "<span style=\"font-size:2rem\" class=\"point\" onClick=\"artdel('".$row[0]."')\" >".$row[1]."<i  class=\"fa fa-times\"></i></span><br>";
}
?>