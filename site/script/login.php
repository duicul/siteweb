t <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
$conn=new mysqli($servername,$username,$password,$dname);
$password=hash('sha3-512',$_POST['password']);
$sql="SELECT * FROM user WHERE USERNAME='".$_POST['user']."'";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
    if(!$result)
		echo "Wrong username/password";
    else
	{if($result->num_rows>0)
    {$row = mysqli_fetch_assoc($result);
	if($row['PASSWORD']==$password)
	{session_start();
    $_SESSION['user'] = $row['USERNAME'];
    $_SESSION['name'] = $row['NAME'];
    $_SESSION['mail'] = $row['MAIL'];
	$_SESSION['admin']=$row['ADMIN'];}
	else {echo"Wrong password";}
	}
	 else
	 {echo"Wrong username";}
    }
 $result->close();
?> 