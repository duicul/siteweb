 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
if($_GET['tip']=="none")
{$cond="";}
else{$cond="WHERE TYPE='".$_GET['tip']."'";}
$conn=new mysqli($servername,$username,$password,$dname);
$sql="SELECT a.ID,a.TITLE,a.TXT,a.TYPE,a.IMG,v.AID,AVG(v.SCORE) as SCOR FROM (SELECT * FROM article ".$cond.") a,vote v WHERE a.ID=v.AID GROUP BY AID ORDER BY SCOR DESC ";
//echo $sql;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	
    if($result)
	{$rows = mysqli_fetch_all($result);
    //print_r($rows);
	 echo "<br>";
	 $i=0;
	if(sizeof($rows)>0)
	foreach($rows as $row)
{ if($i>10)
	break;
    $i++;
   
   //print_r($row);
    echo "<p>";
    $q="<a class=\"alink\" href=\"/site/page.php?id=".$row[0]."&type=".$row[3]."\">".$row[1]."  ";
     $q.=($row[6]/1)."<i class=\"point fa fa-star-o\"></i><br>";
    echo $q;
    if(strlen($row[4])>0)
    echo "<img align=\"left\" src=\"/site/img/".$row[4]."\" width=\"100\" height=\"80\"\"></img>";
    echo "</a>";
    echo substr($row[2],0,40)."....";
    echo "</p><br><br>";
}}else
	echo "no result";
  $conn->close();
?>