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
	//echo $sql."<br>";
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
	
$sql="UPDATE article SET RATE='".$row['NUMAR']."' WHERE ID='".$_GET['id']."' AND TYPE=".$_GET['type'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	
$sql="SELECT * FROM article WHERE ID='".$_GET['id']."' AND TYPE=".$_GET['type'];
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
$sql="SELECT * FROM article a WHERE TYPE=".$_GET['type']." ORDER BY DATE LIMIT 1";
	$result = $conn->query($sql);
	$newart = mysqli_fetch_assoc($result);
?>
<title><?php echo $row['TITLE'];?></title>
</head>
<body onLoad="start(<?php echo $row['TYPE'] ?>,'<?php echo $row['ID'] ?>','<?php echo $aux ?>','<?php echo $_GET['id'] ?>');">
<header>
<div class="headerimag"></div>	
<nav class="navbar navbar-expand-lg navbar-light bg-dark"> 
   <div class="mr-auto link"></div>
   <span id="newsletter"></span>
   <span id="logdata"></span>
    <div  id="log"></div>   
    <?php if(isset($_SESSION['admin'])&&$_SESSION['admin']==1)
    echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"#\" ><i class=\"fa fa-unlock-alt\" aria-hidden=\"true\" onClick=\"artchange('".$_GET['id']."');\">Change this page</i></a></li>";
	  
	function showpagin($sect){
	echo "<span class=\"pagin\" id=\"#toppagin\">";
	echo "<a class=\"linkbutton point\" onClick=\"showpag(0);\"><i class=\"fa fa-fast-backward\" ></i></a>";
    echo "<a class=\"linkbutton point\" onClick=\"showprev();\"><i class=\"fa fa-step-backward\" ></i></a>";
	for($i=0;$i<sizeof($sect);$i=$i+1)
	echo "<a class=\"pageno".$i." linkbutton point\" onClick=\"showpag(".$i.");\"><i class=\"fa\">".($i+1)."</i></a>";
	echo "<a class=\"linkbutton point\" onClick=\"shownext();\"><i class=\"fa fa-step-forward\" ></i></a>";
	echo "<a class=\"linkbutton point\" onClick=\"showpag(".(sizeof($sect)-1).");\"><i class=\"fa fa-fast-forward\" ></i></a>";
    echo "</span>";}
	?>
</nav>
</header>

<div id="newarticle">
<div style="width: 100%">
</div>
<i class="fa fa-times point fa-2x" onclick="closenewarticle();" href="#">Close<br></i>
<div id="newarticletxt">
<div align="center">
<?php
echo "<a style=\"text-decoration:none;color:#000;\" href=\"/site/page.php?id=".$newart['ID']."&type=".$newart['TYPE']."\">";
	?>
  <br>
  <h3 >
	<?php echo $newart['TITLE']; ?>
	</h3>
	</div>
	<?php if(isset($newart['IMG']))
{echo "<img align=\"left\" src=\"/site/img/".$newart['IMG']."\"/ width=200 height=80>";}
	if(isset($newart['TXT'])){echo substr($newart["TXT"],0,400)."....";}
	echo "</a>";?>	
	</div>	
</div>	
	
<div class="container-fluid">
<div class="row">
	<div class="col-3 page_left">
		<div id="newcomm"><?php echo $row['TYPE'] ?> </div>
	</div>
	
<div class="col-6" style="background: rgba(255,255,255,1.00)" id="articlemain">

<h2 align="center" id="arttitle"><?php echo $row['TITLE']; ?></h2>

<p>Articol creat de : <?php echo $row['USERNAME'];?></p>

<?php 
if(strlen($row['IMG'])>0)
{echo "<a class=\"example-image-link\" href=\"/site/img/".$row['IMG']."\" data-title=\"".$row['TITLE']."\" data-lightbox=\"imag1\">";
 echo "<img class=\"example-image-link\" alt=\"\" src=\"/site/img/";
echo $row['IMG']."\" style=\"width:100%;height:200px;display:block;\"></a>";}
	?>
<br>
<?php $arrtxt=preg_split("/\n/",$row['TXT'],-1,PREG_SPLIT_NO_EMPTY);
	echo "<p class=\"art_txt\" style=\"font-weight:bold\">".$arrtxt[0]."</p>";
	$mainarttxt=array();
	for($i=1;$i<sizeof($arrtxt);$i=$i+1)
	{if(strlen($arrtxt[$i])>3)
	array_push($mainarttxt,$arrtxt[$i]);}
	$sect=array_chunk($mainarttxt,3);
	showpagin($sect);
	for($i=0;$i<sizeof($sect);$i=$i+1)
	{echo "<div class=\"sections\" style=\"".($i==0?"display:block":"display:none")."\" id=\"sectart".$i."\">";
		for($j=0;$j<sizeof($sect[$i]);$j=$j+1)
	{	//$inter=(int)(sizeof($mainarttxt)/3)==0?1:(int)(sizeof($mainarttxt)/3+1);
	echo "<div class=\"sectpart\">";
	if(isset($row['IMG'.(string)($j+1)])&&strlen($row['IMG'.(string)($j+1)])>0)
    {echo $row['IMG'.(string)($j+1)]."<br>";
	echo "<span style=\"display:block;text-align:right;\"><a class=\"example-image-link\" href=\"/site/img/";
	echo $row['IMG'.(string)($j+1)];
	echo "\" data-title=\"".$row['TITLE']."\" data-lightbox=\"imag".($i+1)."\">";
    echo "<img class=\"example-image-link\" alt=\"\"  src=\"/site/img/";
    echo $row['IMG'.(string)($j+1)];
	echo "\" style=\"width:40%;height:150px;display:block;\"></a></span>";}
	 /*for($j=$i*$inter;$j<($i+1)*$inter&&$j<sizeof($mainarttxt);$j=$j+1)
	{//print_r($mainarttxt[$j]);
	if(strlen($mainarttxt[$j])>2&&isset($mainarttxt[$j]))
	{*/echo "<p class=\"art_txt\">".$sect[$i][$j]."</p>";//}}
		echo "</div>";
		echo "<br>";
	}echo "</div>";
	}	
	?>
<span class="pagin">
<?php
	showpagin($sect);

	?>
</span>
<p id="txtHint"></p>
<p id="score" align="right"></p>
<p align="right" id="rate"></p>
<p id="sol"></p>
<p align="right" id="star"></p> 
<div id="artchangbutt"></div>
<br>
<p id="username"></p>
<p id="test"></p>
<hr>
<br>
<div class="commpanel">
<textarea id="addcom" class="commbox"></textarea><br>
<div class="commhead"><?php echo $aux;?> 
<button type="submit" class="btn-outline-success" onClick="addcom('<?php echo $aux;?>','<?php echo $_GET['id']?>');">Post</button>
	</div>
	</div>
<p id="resp"></p>
<br>
<br>
<p id="comm"> Comments</p>
</div>
		
<div class="col-3 page_right">
	<div id="loadsearch"></div>
<h3>Top score</h3>
<p id="topscore"></p>
<h3>Most Visited</h3>
<p id="rank"></p>
</div>

</div>
</div>
	<hr>
	<footer class="footer">
	<nav class="navbar navbar-expand-lg navbar-light bg-faded">
	<span class="mr-auto link"></span>
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