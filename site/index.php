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
$sql="SELECT * FROM mainpage WHERE TYPE='all'";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	if(isset($_SESSION['user']))
		$aux=$_SESSION['user'];
	else $aux='anonymous';
	?>
   <title><?php echo $row['TITLE']; ?></title>
</head>

<body onLoad="startmain('none','<?php echo $aux ?>')">
	
<nav class="navbar navbar-expand-lg navbar-light bg-dark"> 
 <a class="nav-link linkbutton" href="/site/">Stiri</a>
  <div id="loadsearch"></div>
   <div id="link" class="mr-auto"></div>
   <span id="logdata"></span>
    <div  id="log"></div>   

</nav>


<div class="container-fluid">
<div class="row">
	<div class="col-2">
<h3>Top score</h3>
<p id="topscore"></p>
	</div>

<div class="col-7" style="background: rgba(255,255,255,1.00)">

<h2 align="center"><?php echo $row['TITLE']; ?></h2>

<?php 
if(strlen($row['IMG'])>0)
{echo "<img src=\"/site/img/";
echo $row['IMG']."\" width=\"500\" height=\"200\">";}
?>

<br>
<?php echo $row['TXT']; ?>		
<p id="txtHint"></p>
<p id="score" align="right"></p>
<p align="right" id="rate"></p>
<p id="sol"></p>
<p align="right" id="star"></p> 
<br>
<p id="username"></p>
<p id="test"></p>

<?php echo $aux;?>
</div>
		
<div class="col-3">
<h3>Most Visited</h3>
<p id="rank"></p>
</div>
</div></div>
   
	<script src="/site/jquery-3.2.1.slim.min.js"></script>
	<script src="/site/popper.min.js"></script>
	<script src="/site/bootstrap.min.js"></script>
	
	</body>
</html>
