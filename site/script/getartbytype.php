 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
session_start();
if(isset($_SESSION['user']))
{$conn=new mysqli($servername,$username,$password,$dname);
$sql="SELECT * FROM article WHERE TYPE=".$_GET['tip'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($result=$conn->query($sql))
{$rows=mysqli_fetch_all($result);
 echo "<option value=\"\">None</option>";
 foreach($rows as $row)
 {echo "<option value=\"".$row[1]."\">".$row[1]."</option>";}
$conn->close();

}}
?> 