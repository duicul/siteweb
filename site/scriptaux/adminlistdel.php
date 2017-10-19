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
$sql="SELECT * FROM article";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	$rows = mysqli_fetch_all($result);
	if(isset($_SESSION['user']))
		$aux=$_SESSION['user'];
	else $aux='anonymous';
	?>
<title>Remove article</title>
</head>

<body onLoad="startmain('none','<?php echo $aux ?>');listdel();">
	
<nav class="navbar navbar-expand-lg navbar-light bg-dark"> 
 <a class="nav-link linkbutton" href="/site/">Stiri</a>
  <div id="loadsearch"></div>
   <div id="link" class="mr-auto"></div>
    <div  id="log"></div>   

</nav>


<div class="container-fluid">
<div class="row">
	<div class="col-2"></div>

<div class="col-7" style="background: rgba(255,255,255,1.00)">
<p id="artdel"></p>
<p id="test"></p>	
	</div>
		
<div class="col-3">
<p id="rank"></p>
</div>
</div></div>
   
	<script src="/site/jquery-3.2.1.slim.min.js"></script>
	<script src="/site/popper.min.js"></script>
	<script src="/site/bootstrap.min.js"></script>
	
	</body>
</html>
