<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
if(!($_SESSION['user']&&isset($_SESSION['user'])&&$_SESSION['admin']==1))
	header('Location: '.$uri.'/site/');
else {$conn=new mysqli($servername,$username,$password,$dname);
/*$target_dir=dirname(getcwd())."\img\\";
$target_file = $target_dir . basename($_FILES["file@main"]["name"]);
*/
$sql="SELECT * FROM mainpage WHERE TYPE=".$_POST['type@main'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	if($result)
		$row = mysqli_fetch_assoc($result);
    else $row=[];
print_r($row);
if(sizeof($row)>0)
{$val="";
	if(strlen($file)!=0)
	{$val=" IMG='".$file."'";
    $sql="UPDATE mainpage SET ".$val." WHERE TYPE=".$_POST['type@main'];
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
     $result = $conn->query($sql);} 
 
    if(isset($_POST['txt@main'])&&strlen($_POST['txt@main'])>2)
	{$txt=$_POST['txt@main'];
	 $txt=preg_replace('/<br(\s+)?\/?>/i', "\n",$txt);
	 $val=" TXT='".htmlentities(htmlspecialchars($txt,$flags=ENT_QUOTES|ENT_HTML5))."'";
     $sql="UPDATE mainpage SET ".$val." WHERE TYPE=".$_POST['type@main'];
      if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
      $result = $conn->query($sql);}     
 
	 if(isset($_POST['title@main'])&&strlen($_POST['title@main'])!=0)
	 {$txt=$_POST['title@main'];
	 $txt=preg_replace('/<br(\s+)?\/?>/i', "\n",$txt);
	 $val=" TITLE='".htmlentities(htmlspecialchars($txt,$flags=ENT_QUOTES|ENT_HTML5))."'";
      $sql="UPDATE mainpage SET ".$val." WHERE TYPE=".$_POST['type@main'];
     if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     }
     $result = $conn->query($sql);}  
	 }
	 }
	
?> 