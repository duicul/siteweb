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
//echo $sql;
//0-name 1-username 2-password 3-mail
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
    if($result)
	{$row=mysqli_fetch_assoc($result);
     $admin=$row['ADMIN'];
	 //echo $admin."admin";
	}} 
 
//echo $_GET['aid'];
$sql="SELECT * FROM comment WHERE AID='".$_GET['aid']."' ORDER BY DATE DESC ";
//echo $sql;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
    if(!$result)
	{	//echo "No comments";
	}
	else
	{//echo $result->num_rows."comments<br>";
    echo "<ul class=\"list-group\">";
	 $rows = mysqli_fetch_all($result);
	//print_r($rows);
	for($i=0;$i<sizeof($rows);$i=$i+1)
	{ echo "<li class=\"list-group-item list-group-item-";
		if($i%2==0)
			echo "success";
	    else echo "info";
		echo "\">";
      echo $rows[$i][1]."<br>".$rows[$i][4]."<br>";
      echo $rows[$i][3]."<br>";
      //echo "<span class=\"point\"><i class=\"fa fa-thumbs-o-up\">up</i></span><span class=\"point\"> <i class=\"fa fa-thumbs-down\">down</i></span>";
      if (isset($_SESSION['user'])&&($_SESSION['user']==$rows[$i][1]||($admin==1&&"anonymous"==$rows[$i][1])))
	  {echo "<span class=\"point\" align=\"right\"><i class=\"fa fa-times\" onClick=\"remcom('".$rows[$i][0]."','".$rows[$i][2]."')\">remove</i></span>";}
      echo "</li>";}
	 echo "</ul>";
}
 $result->close();
}
?> 