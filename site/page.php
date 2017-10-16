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
//echo $_GET['id'];
//echo $_GET['type'];
if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
$sql="INSERT INTO visit (AID,IP) VALUES ('".$_GET['id']."','".$ipaddress."')";
	echo $sql."<br>";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	
$sql="SELECT COUNT(AID) as NUMAR FROM visit WHERE AID='".$_GET['id']."'";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	
	$row = mysqli_fetch_assoc($result);
	echo $row['NUMAR'];
	
$sql="UPDATE article SET RATE='".$row['NUMAR']."' WHERE ID='".$_GET['id']."' AND TYPE='".$_GET['type']."'";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	
$sql="SELECT * FROM article WHERE ID='".$_GET['id']."' AND TYPE='".$_GET['type']."'";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	if($result)
		$_SESSION['aid']=$row['ID'];
	if(isset($_SESSION['user']))
		$aux=$_SESSION['user'];
	else $aux='anonymous';
?>

<title><?php echo $row['TITLE'];?></title>
</head>
<body onLoad="start('<?php echo $row['TYPE'] ?>','<?php echo $row['ID'] ?>','<?php echo $aux ?>')">
	
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

<h2 align="center"><?php echo $row['TITLE']; ?></h2>

<p>Articol creat de : <?php echo $row['USERNAME'];?></p>

<?php 
if(strlen($row['IMG'])>0)
{echo "<img src=\"/site/img/";
echo $row['IMG']."\" width=\"500\" height=\"200\">";}
?>

<br>
<?php echo $row['TXT']; ?>		
<p id="txtHint">Not row of code</p>
<p id="score" align="right"></p>
<p align="right" id="rate"></p>
<p id="sol">sfd</p>
<p align="right" id="star"></p> 
<br>
<p id="username"></p>
<p id="test"></p>

<?php echo $aux;?>
<br>
<button onClick="alert('gogu');">Post</button>
<textarea rows="5"  id="addcom" class="form-control-plaintext" style="height:200;border:outset"></textarea><br>
<button type="submit" class="btn-outline-success" onClick="addcom('<?php echo $aux;?>','<?php echo $_GET['id']?>');">Post</button>

<p id="resp">hgh</p>
<br>
<br>
<p id="comm"> Comments</p>

</div>
		
<div class="col-3">
<h3>Most Visited</h3>
<p id="rank"></p>
<h3>Top score</h3>
<p id="topscore"></p>
</div>

</div>
</div>
	
  
	<script src="/site/jquery-3.2.1.slim.min.js"></script>
	<script src="/site/popper.min.js"></script>
	<script src="/site/bootstrap.min.js"></script>
	
	</body>
</html>
