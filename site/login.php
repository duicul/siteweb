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
$sql="SELECT * FROM user WHERE USERNAME='".$_POST['user']."' AND PASSWORD='".$_POST['password']."'";
// Check connection
echo $sql;
//0-name 1-username 2-password 3-mail
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
    if(!$result)
		echo "No result";
    else
	{echo "Select returned ";
	echo $result->num_rows;
    if($result->num_rows>0)
    {$row = mysqli_fetch_assoc($result);
    echo "<br>".$row["NAME"]."<br>";
    echo $row['USERNAME']."<br>";
	echo $row['PASSWORD']."<br>";
	 echo $row['MAIL']."<br>";
     echo $row['ADMIN']."<br>";
    session_start();
    $_SESSION['user'] = $row['USERNAME'];
    $_SESSION['name'] = $row['NAME'];
    $_SESSION['mail'] = $row['MAIL'];
	echo "Session<br>";
    echo $_SESSION['user']."<br>";
	echo $_SESSION['name']."<br>"; 
}	
}
 $result->close();
echo "Connected successfully";
echo "<br>".$_POST['user']."<br>";
echo $_POST['password']."<br>";
header('Location: '.$uri.'/site/');
?> 