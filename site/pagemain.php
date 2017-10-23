<!Doctype html>
<html>
<head>
	<link rel="stylesheet" href="/site/bootstrap.css">
       <link rel="stylesheet" href="/site/site.css">
	<link rel="stylesheet" href="/site/dist/css/lightbox.css">
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
$sql="SELECT * FROM mainpage WHERE TYPE='".$_GET['tip']."'";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	if(isset($_SESSION['user']))
		$aux=$_SESSION['user'];
	else $aux='anonymous';
?>

<title><?php echo $row['TITLE'];?></title>
</head>
<body onLoad="startmain('<?php echo $row['TYPE'] ?>','<?php echo $aux ?>')">
<header>
<div class="headerimag"></div>	
<nav class="navbar navbar-expand-lg navbar-light bg-dark"> 
 <a class="nav-link linkbutton" href="/site/">Stiri</a>
  <div id="loadsearch"></div>
   <div class="mr-auto link"></div>
   <span id="logdata"></span>
    <div  id="log"></div>   

</nav>
</header>

<div class="container-fluid" >
<div class="row">
	<div class="col-3 page_left">
	<h3>Top score</h3>
<p id="topscore"></p>		
	</div>
	
<div class="col-6" style="background: rgba(255,255,255,1.00)">

<h2 align="center"><?php echo $row['TITLE']; ?></h2>

<?php 
if(strlen($row['IMG'])>0)
{echo "<a class=\"example-image-link\" href=\"/site/img/".$row['IMG']."\" data-title=\"".$row['TITLE']."\" data-lightbox=\"imag1\">";
 echo "<img class=\"example-image-link\" alt=\"\" src=\"/site/img/";
echo $row['IMG']."\" style=\"width:100%;height:200px;\"></a>";}
?>
<br>
<?php  $arrtxt=explode("\n",$row['TXT']);
	echo "<p class=\"art_txt\" style=\"font-weight: bold;\">".$arrtxt[0]."</p>";
	for($i=1;$i<sizeof($arrtxt);$i=$i+1)
		echo "<p class=\"art_txt\" >".$arrtxt[$i]."</p>";
	?>		
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
		
<div class="col-3 page_right">
<h3>Most Visited</h3>
<p id="rank"></p>
</div>

</div>
</div>
	<hr>
	<footer class="footer">
	<nav class="navbar navbar-expand-lg navbar-light bg-faded">
	<span>
	<div class="link"></div>
	</span>
    <span style="text-align:right;text-decoration: none;width:100%">
    <a href="https://www.facebook.com" ><i class="fa fa-2x fa-facebook-official" aria-hidden="true"></i></a>
	<a href="https://github.com/duicul/siteweb"><i class="fa fa-2x fa-github" aria-hidden="true"></i></a>
    </span>	
	</nav>
</footer>
  
	<script src="/site/jquery-3.2.1.js"></script>
	<script src="/site/popper.min.js"></script>
	<script src="/site/dist/js/lightbox-plus-jquery.js"></script>
	<script src="/site/bootstrap.min.js"></script>

	</body>
</html>
