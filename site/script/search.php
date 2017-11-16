 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
$conn=new mysqli($servername,$username,$password,$dname);
if($_GET['tip']==1||strlen($_GET['tip'])==0)
$val="";
	else $val="WHERE TYPE=".$_GET['tip'];;
$sql="SELECT * FROM article ".$val;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
     $result = $conn->query($sql);
	if($result)
		$rows = mysqli_fetch_all($result);
	else $rows=[];
$i=0;
	$var=array();
if(sizeof($rows)>0)
{foreach($rows as $row){
$pattern="/\b\w*".$_GET['search']."\w*\b/i";
preg_match_all($pattern,$row[1]." ".$row[2],$match);
if(sizeof($match[0])>0)
$var[$i]=sizeof($match[0]);
$i++;}
if(sizeof($var)>0){
	arsort($var);
	foreach($var as $key=>$value)
	{ echo "<br>";
	 echo "<a href=\"/site/page.php?id=".$rows[$key][0]."&type=".$rows[$key][4]."\">";
	 if(strlen($rows[$key][4])>0)
	 {echo "<img src=\"/site/img/".$rows[$key][3]."\" width=\"100\" height=\"80\">";}
	 echo $rows[$key][1]."</a><br>";		
	echo substr($rows[$key][2],0,100);
	}}
   }
?>