<?php
session_start();
$aux=$_GET['aid'];
if(isset($_SESSION['user']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
$conn=new mysqli($servername,$username,$password,$dname);

$sql="SELECT * FROM vote WHERE UID='".$_SESSION['user']."' AND AID='".$aux."'";
echo $sql."ceva<br>";
	$vote=0;
if ($conn->connect_error) 
	$conn->close();
if($result = $conn->query($sql))
{$row=mysqli_fetch_assoc($result);
if($row['SCORE']>=0&&$row['SCORE']<=5)
	$vote=$row['SCORE'];}
echo "<script type=\"text/javascript\"> showscore(".$vote.");alert(\"gogu\");</script>";
echo "<div border=6 onMouseOut=\"showscore(".$vote.")\" onFocus=\"showscore(".$vote.")\" onLoad=\"showscore(".$vote.")\">";	
echo "<i id=\"star1\" class=\"fa fa-star-o\" onMouseOver=\"str1a();\" onMouseOut=\"str1b();\" onClick=\"rating(1,'";
echo $aux."');\">1 </i>";
echo "<i id=\"star2\" class=\"fa fa-star-o\" onMouseOver=\"str2a();\" onMouseOut=\"str2b();\" onClick=\"rating(2,'";
echo $aux."');\">2 </i>";
echo "<i id=\"star3\" class=\"fa fa-star-o\" onMouseOver=\"str3a();\" onMouseOut=\"str3b();\" onClick=\"rating(3,'";
echo $aux."');\">3 </i>";
echo "<i id=\"star4\" class=\"fa fa-star-o\" onMouseOver=\"str4a();\" onMouseOut=\"str4b();\" onClick=\"rating(4,'";
echo $aux."');\">4 </i>";
echo "<i id=\"star5\" class=\"fa fa-star-o\" onMouseOver=\"str5a();\" onMouseOut=\"str5b();\" onClick=\"rating(5,'";
echo $aux."');\">5 </i>";
echo "</div>";
}?>