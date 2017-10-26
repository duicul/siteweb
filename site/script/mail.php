 <?php
session_start();
if(isset($_POST['subj']))
$subj=$_POST['subj'];
else $subj="";

if(isset($_POST['mess']))
$mess=$_POST['mess'];
else $mess="";

echo "<html><body>";
echo "hello";
//if(isset($_SESSION['user'])&&isset($_SESSION['user'])&&$_SESSION['admin']==1)
{$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
$conn=new mysqli($servername,$username,$password,$dname);
    $sql="SELECT u.NAME,u.MAIL FROM user u UNION SELECT nl.NAME,nl.MAIL FROM newsletter nl";
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
     $result = $conn->query($sql);
 if(!$result)
	 echo "no result";
  echo $sql."<br>"."lol<br>";
 $rows=mysqli_fetch_all($result);
 $subject="!!!!Breaking news ".substr($subj,0,20);
  $message = wordwrap(substr($mess,0,70), 70, "\r\n");
  $headers = 'From: webmaster@www.stiri.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
 foreach($rows as $row)
 { print_r($row);
  $to=$row[1];
  echo "<br>".$to." ".$subject." ".$message." ".$headers."<br>";
  //mail($to, $subject, $message, $headers);
 }}
echo "</body></html>";
?> 