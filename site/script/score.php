 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
$conn=new mysqli($servername,$username,$password,$dname);
if(isset($_GET['aid']))
{$sql="SELECT * FROM article WHERE ID='".$_GET['aid']."'";
   $result = $conn->query($sql);
    if($result)
	{$row = mysqli_fetch_assoc($result);
    $type=$row['TYPE'];}
}
$type=isset($type)?$type:$_GET['tip'];

if($type==1)
{$cond="";}
else{$cond="WHERE TYPE=".$type;}
$sql="SELECT a.ID,a.TITLE,a.TXT,a.TYPE,a.IMG,v.AID,AVG(v.SCORE) as SCOR FROM (SELECT * FROM article ".$cond.") a,vote v WHERE a.ID=v.AID GROUP BY AID ORDER BY SCOR DESC ";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	  if($result)
	{$rows = mysqli_fetch_all($result);
	 echo "<br>";
	 $i=0;
	if(sizeof($rows)>0)
	foreach($rows as $row)
{ if($i>5)
	break;
    $i++;
    echo "<p>";
    $q="<a class=\"alink\" href=\"/site/page.php?id=".$row[0]."&type=".$row[3]."\">".$row[1]."  ";
     $q.=($row[6]/1)."<i class=\"point fa fa-star-o\"></i><br>";
    echo $q;
    if(strlen($row[4])>0)
    echo "<img align=\"left\" src=\"/site/img/".$row[4]."\" width=\"100\" height=\"80\"\"></img>";
    echo "</a>";
    echo substr($row[2],0,100)."....";
    echo "</p><br><br>";
}}else
	echo "no result";
  $conn->close();
?>