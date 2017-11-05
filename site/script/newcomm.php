 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
$conn=new mysqli($servername,$username,$password,$dname);
if(isset($_POST['aid'])&&strlen($_POST['aid'])>0&&$_POST['aid']!="none")
{$sql="SELECT * FROM article WHERE ID='".$_POST['aid']."'";
$result = $conn->query($sql);
    if($result)
	{$i=0;
 
	 $row=mysqli_fetch_assoc($result);}
$cond="WHERE TYPE='".$row['TYPE']."'";
}
else {if(isset($_POST['tip'])&&strlen($_POST['tip'])>0&&$_POST['tip']!="none")
$cond="WHERE TYPE='".$_POST['tip']."'";
else $cond="";
}
 
$sql="SELECT c.*,a.TYPE FROM comment c LEFT JOIN article a ON c.AID=a.ID ".$cond." ORDER BY DATE DESC LIMIT 6";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}     
     //echo "hello";
     $result = $conn->query($sql);
	
    if($result)
	{$i=0;
     echo "<h5>New comments</h5>";
	 $rows=mysqli_fetch_all($result);
    //print_r($rows);
	 $t=sizeof($rows);	
	 if($t>0)
	 do
	{echo "<div style=\"font-size=60\" class=\"panel-newcomm\" style=\"width:100%\"><a style=\"text-decoration:none;\" href=\"/site/page.php?id=".$rows[$i][2]."&type=".$rows[$i][5]."\">";
	//echo "<div>";
	echo $rows[$i][1]." ".$rows[$i][4]."</a><br>";
	echo substr($rows[$i][3],0,30)."...";
	echo "</div>";
	 $i=$i+1;
	}while($i<10&&$i<$t);}
  $conn->close();
?>