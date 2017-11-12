<?php
session_start();
if(isset($_POST['aid']))
{$aux=$_POST['aid'];
if(isset($_SESSION['user']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
$conn=new mysqli($servername,$username,$password,$dname);

$sql="SELECT * FROM vote WHERE UID='".$_SESSION['user']."' AND AID='".$aux."'";
	$vote=0;
if ($conn->connect_error) 
	$conn->close();
if($result = $conn->query($sql))
{$row=mysqli_fetch_assoc($result);
if($row['SCORE']>=0&&$row['SCORE']<=5)
	$vote=$row['SCORE'];}
echo "<script type=\"text/javascript\"> showscore(".$vote.");alert(\"gogu\");</script>";
echo "<div border=6 onMouseOut=\"showscore(".$vote.")\" onFocus=\"showscore(".$vote.")\" onLoad=\"showscore(".$vote.")\">";	
echo "<i id=\"star1\" class=\"point fa fa-star-o\"  onClick=\"rating(1,'";
echo $aux."');\">1 </i>";
echo "<i id=\"star2\" class=\"point fa fa-star-o\"  onClick=\"rating(2,'";
echo $aux."');\">2 </i>";
echo "<i id=\"star3\" class=\"point fa fa-star-o\"  onClick=\"rating(3,'";
echo $aux."');\">3 </i>";
echo "<i id=\"star4\" class=\"point fa fa-star-o\"  onClick=\"rating(4,'";
echo $aux."');\">4 </i>";
echo "<i id=\"star5\" class=\"point fa fa-star-o\"  onClick=\"rating(5,'";
echo $aux."');\">5 </i>";
echo "</div>";
}
}?>