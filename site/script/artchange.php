 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
if(!($_SESSION['user']&&isset($_SESSION['user'])&&$_SESSION['admin']==1))
	header('Location: '.$uri.'/site/');
else{
$conn=new mysqli($servername,$username,$password,$dname);
/*$target_dir=dirname(getcwd())."\img\\";
$target_file = $target_dir . basename($_FILES["file@art"]["name"]);
*/
$sql="SELECT * FROM article WHERE ID='".$_POST['aid']."'";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
     $result = $conn->query($sql);
	if($result)
	{$row = mysqli_fetch_assoc($result);}
    else $row=[];
if(sizeof($row)>0)
{$val="";
    if(isset($_POST['txt@art'])&&strlen($_POST['txt@art'])>2||strlen($filetxt)>0)
	{  $txt=$_POST['txt@art'];
	   $txt=preg_replace('/<br(\s+)?\/?>/i', "\n",$txt);
	 $val=" TXT='".htmlentities(htmlspecialchars($txt,$flags=ENT_QUOTES|ENT_HTML5))."'";
     $sql="UPDATE article SET ".$val." WHERE ID='".$_POST['aid']."'";
      if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
      $result = $conn->query($sql);}  
 
	 if(isset($_POST['title@art'])&&strlen($_POST['title@art'])!=0)
	 {$txt=$_POST['title@art'];
	 $txt=preg_replace('/<br(\s+)?\/?>/i', "\n",$txt);
	 $val=" TITLE='".htmlentities(htmlspecialchars($txt,$flags=ENT_QUOTES|ENT_HTML5))."'";
      $sql="UPDATE article SET ".$val." WHERE TYPE=".$_POST['type@art'];
     if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     }
     $result = $conn->query($sql);}  
 
     if(isset($_POST['title@art'])&&strlen($_POST['txt@art'])>2||strlen($filetxt)>0)
	{  $txt=$_POST['title@art'];
	   $txt=preg_replace('/<br(\s+)?\/?>/i', "\n",$txt);
	 $val=" TITLE='".htmlentities(htmlspecialchars($txt,$flags=ENT_QUOTES|ENT_HTML5))."'";
     $sql="UPDATE article SET ".$val." WHERE ID='".$_POST['aid']."'";
      if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
      $result = $conn->query($sql);} 
}}
?> 