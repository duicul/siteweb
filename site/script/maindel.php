 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
if(isset($_SESSION['user'])&&$_GET['tip']!="all")
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
 $sql="DELETE a.*,c.*,m.*,vi.*,vo.* FROM mainpage m INNER JOIN article a ON m.TYPE=a.TYPE INNER JOIN visit vi ON a.ID=vi.AID INNER JOIN vote vo ON vo.AID=a.ID INNER JOIN comment c ON a.ID=c.AID WHERE a.TYPE='".$_GET['tip']."'";
 echo $sql;
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
    if($result)
		echo "result";
  else echo "no result";
}}}}
$conn->close();
echo "Connected successfully";
?> 