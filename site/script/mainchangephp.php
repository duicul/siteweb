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
$uploadOk = 1;
$filename=pathinfo($target_file,PATHINFO_FILENAME);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
	//header('Location: '.$uri.'/site/');
    //$uploadOk = 0;
}
// Check file size
if ($_FILES["file@main"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	header('Location: '.$uri.'/site/');
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file@main"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file@main"]["name"]). " has been uploaded.";
		$file=basename( $_FILES["file@main"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
		$file="";
    }
}
*/
$sql="SELECT * FROM mainpage WHERE TYPE='".$_POST['type@main']."'";
echo $sql."<br>";
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
	/*if(strlen($file)!=0)
	{$val=" IMG='".$file."'";
    $sql="UPDATE mainpage SET ".$val." WHERE TYPE='".$_POST['type@main']."'";
     echo $sql."<br>";
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
     $result = $conn->query($sql);} */
 
    if(isset($_POST['txt@main'])&&strlen($_POST['txt@main'])>2)
	{$txt=$_POST['txt@main'];
	 $txt=preg_replace('/<br(\s+)?\/?>/i', "\n",$txt);
	 echo $txt."<br>";
	 $val=" TXT='".htmlentities(htmlspecialchars($txt,$flags=ENT_QUOTES|ENT_HTML5))."'";
     $sql="UPDATE mainpage SET ".$val." WHERE TYPE='".$_POST['type@main']."'";
     echo $sql."<br>";
      if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
      $result = $conn->query($sql);}     
 
	 if(isset($_POST['title@main'])&&strlen($_POST['title@main'])!=0)
	 {$txt=$_POST['title@main'];
	 $txt=preg_replace('/<br(\s+)?\/?>/i', "\n",$txt);
	 echo $txt."<br>";
	 $val=" TITLE='".htmlentities(htmlspecialchars($txt,$flags=ENT_QUOTES|ENT_HTML5))."'";
      $sql="UPDATE mainpage SET ".$val." WHERE TYPE='".$_POST['type@main']."'";
     echo $sql."<br>";
     if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     }
     $result = $conn->query($sql);}  
	  echo $_POST['txt@main'];}
	 }
?> 