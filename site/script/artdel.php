 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
if(isset($_SESSION['user']))
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
{
 $sql="DELETE a.*,vi.*,vo.*,c.* FROM article a LEFT JOIN visit vi ON a.ID=vi.AID LEFT JOIN vote vo ON vo.AID=a.ID LEFT JOIN comment c ON a.ID=c.AID WHERE a.ID='".$_GET['aid']."'";
 $result=$conn->query($sql);
}}}}
$conn->close();
?> 