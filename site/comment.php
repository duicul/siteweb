 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
if(isset($_GET['aid']))
{$conn=new mysqli($servername,$username,$password,$dname);
	session_start();

$admin=0;
if(isset($_SESSION['user']))
{$sql="SELECT * FROM user WHERE USERNAME='".$_SESSION['user']."'";
// Check connection
echo $sql;
//0-name 1-username 2-password 3-mail
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
    if($result)
	{$row=mysqli_fetch_assoc($result);
     $admin=$row['ADMIN'];
	 echo $admin."admin";
	}} 
 
echo $_GET['aid'];
$sql="SELECT * FROM comment WHERE AID=".$_GET['aid']." ORDER BY DATE DESC ";
echo $sql;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
    if(!$result)
		echo "No comments";
    else
	{echo $result->num_rows."comments<br>";
    echo "<div class=\"container-fluid\">";
	 while($row = mysqli_fetch_assoc($result))
	{ echo "<div class=\"row row_com\">";
      echo "<div class=\"col-2 \">";
      echo "<p class=\"user_com\">";
      echo $row["UID"]."<br>".$row['DATE'],"</p></div>";
      echo "<div class=\"col-4\">";
      echo "<p class=\"txt_com\">";
      echo $row['TEXT']."<br>";
      echo "<span class=\"point\"><i class=\"fa fa-thumbs-o-up\">up</i></span><span class=\"point\"> <i class=\"fa fa-thumbs-down\">down</i></span>";
      if (isset($_SESSION['user'])&&($_SESSION['user']==$row['UID']||$admin==1))
	  {echo "<span class=\"point\"><i class=\"fa fa-times\" align=\"right\" onClick=\"remcom('".$row['CID']."','".$row['AID']."')\">remove</i></span>";}
      echo "</p></div>";
      echo "</div>";
	   echo "</div>";}
	 echo "</div>";
}
 $result->close();
}
?> 