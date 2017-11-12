 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
session_start();
$medie=0;
$conn=new mysqli($servername,$username,$password,$dname);
$sql="SELECT AVG(SCORE) AS MEDIE FROM vote WHERE AID='".$_GET['aid']."'";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($result=$conn->query($sql))
{$row=mysqli_fetch_assoc($result);
 $medie=$row['MEDIE'];
 }
 echo "<div class=\"progress\" style=\"align:center;width:50%;\"><div class=\"progress-bar\" role=\"progressbar\"";
 echo "aria-valuenow=\"".($medie*20)."\" aria-valuemin=\"0\" aria-valuemax=\"100\"";
 echo "style=\"width:".($medie*20)."%;font-size: 1.5rem;height:2rem;\">".($medie/1)."<i class=\"point fa fa-star-o\"></i></div></div>";
$conn->close();
?> 