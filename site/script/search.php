<!Doctype html>
<html>
<head>
	<link rel="stylesheet" href="/site/bootstrap.css">
       <link rel="stylesheet" href="/site/site.css">
        <script src="/site/site.js" type="text/javascript"></script>
        <link rel="stylesheet" href="/site/font-awesome/css/font-awesome.min.css">
 <?php
	session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";

// Create connection
//$conn = new mysqli($servername,$username,$password,$dname);
$conn=new mysqli($servername,$username,$password,$dname);
if($_GET['tip']=="all"||$_GET['tip']=="none"||strlen($_GET['tip'])==0)
$val="";
	else $val="WHERE TYPE='".$_GET['tip']."'";;
$sql="SELECT * FROM article ".$val;
	echo $sql;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	
	if($result)
		$rows = mysqli_fetch_all($result);
	else $rows=[];
	
?>

<title><?php echo "Cauta: ".$_GET['search'];?></title>
</head>
<body onLoad="start('none');">
	
<nav class="navbar navbar-expand-lg navbar-light bg-dark"> 
 <a class="nav-link linkbutton" href="/site/">Stiri</a>
  <div id="loadsearch"></div>
   <div id="link" class="mr-auto"></div>
    <div  id="log"></div>   
</nav>


<div class="container-fluid" style="background:rgba(32,172,208,0.52)">
<div class="row">
	<div class="col-2"></div>
	
<div class="col-7" style="background: rgba(255,255,255,1.00)">
<?php 
//print_r($rows[2]);
//print("<br><br><br>");
$i=0;
	$var=array();
foreach($rows as $row)
{
$pattern="/\b\w*".$_GET['search']."\w*\b/i";
//echo($pattern);
preg_match_all($pattern,$row[2]." ".$row[3],$match);
if(sizeof($match[0])>0)
$var[$i]=sizeof($match[0]);
//print_r($row);
$i++;
//print("<br>");
}
//print_r($var);
if(sizeof($var)>0)
{arsort($var);
//print_r($var);
	foreach($var as $key=>$value)
	{ //echo $key;
	 echo "<br>";
	 //echo $rows[$key][4];
	 echo "<a href=\"/site/page.php?id=".$rows[$key][0]."&type=".$rows[$key][5]."\">";
	 if(strlen($rows[$key][4])>0)
	 {echo "<img src=\"/site/img/".$rows[$key][4]."\" width=\"100\" height=\"80\">";}
	 echo $rows[$key][2]."</a><br>";		
	}}
	?>
</div>
		
<div class="col-3">

<p id="rank"></p>
	
</div>

</div>
</div>
	
  
	<script src="/site/jquery-3.2.1.slim.min.js"></script>
	<script src="/site/popper.min.js"></script>
	<script src="/site/bootstrap.min.js"></script>
	
	</body>
</html>
