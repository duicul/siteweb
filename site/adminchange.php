<!DOCTYPE html>
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
$conn=new mysqli($servername,$username,$password,$dname);
$sql="SELECT * FROM mainpage";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	if($result)
		$rows = mysqli_fetch_all($result);
	else $rows=[];
	if(isset($_SESSION['user']))
		$aux=$_SESSION['user'];
	else $aux='anonymous';
	print_r($rows);
?>
</head>
<body onLoad="log(); link();">
<nav class="navbar navbar-expand-lg navbar-light bg-dark"> 
 <a class="nav-link linkbutton" href="/site/">Stiri</a>
  <form action="search.py" class="navbar-form navbar-left">
		<div class="input-group">
		<input type="search" class="form-control" placeholder="Search" name="search">
		<div class="input-group-btn">
		<button type="submit" class="btn btn-default">Search</button>
		</div>
		</div>
	</form>
   <div id="link" class="mr-auto"></div>
    <p  id="log"></p>   
</nav>

<div class="container-fluid">
<div class="row">
	<div class="col-2"></div>
	
	<div class="col-7" style="background: rgba(255,255,255,1.00)">
<form action="artins.php" method="post" enctype="multipart/form-data">
Photo: <input type="file" name="file@art">  <br />
Title:<input type="text" name="title@art">  <br />
Type: <select name="type@art">
       <?php foreach($rows as $row)
	         echo "<option value=\"".$row[0]."\">".$row[1]."</option>";?>
</select>  <br /> 
Txt:<br/> <textarea name="txt@art" maxlength="5000" cols="70" rows="20" required ></textarea>  <br /> 
<input type="submit" value="Submit"/>
</form>
<p id="txtHint">Not row of code</p>
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