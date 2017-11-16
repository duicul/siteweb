<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
if(!($_SESSION['user']&&isset($_SESSION['user'])&&$_SESSION['admin']==1))
	header('Location: '.$uri.'/site/');
else {$conn=new mysqli($servername,$username,$password,$dname);
$target_dir=dirname(getcwd())."\img\\";
$target_file = $target_dir . basename($_FILES["file@main"]["name"]);
$uploadOk = 1;
$filename=pathinfo($target_file,PATHINFO_FILENAME);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
}
if ($_FILES["file@main"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	header('Location: '.$uri.'/site/');
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file@main"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file@main"]["name"]). " has been uploaded.";
		$file=basename( $_FILES["file@main"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
		$file="";
    }}

$filetxt="";
if($_FILES['txtfile@main']['error'] == UPLOAD_ERR_OK&& is_uploaded_file($_FILES['txtfile@main']['tmp_name']))
{$filetxt=file_get_contents($_FILES['txtfile@main']['tmp_name']);
}	  
	  
if($_POST['type@main']!=-1)
{$sql="SELECT * FROM mainpage WHERE TYPE=".$_POST['type@main'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	if($result)
		$row = mysqli_fetch_assoc($result);
    else $row=[];
if(sizeof($row)>0)
{$val="";
	if(strlen($file)!=0)
	{$val=" IMG='".$file."'";
    $sql="UPDATE mainpage SET ".$val." WHERE TYPE=".$_POST['type@main'];
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
     $result = $conn->query($sql);} 
    if(isset($_POST['txt@main'])&&strlen($_POST['txt@main'])>2||isset($filetxt)&&strlen($filetxt)>2)
	{$aux=$_POST['txt@main'].$filetxt;
     $aux=htmlspecialchars($aux,$flags=ENT_QUOTES|ENT_HTML5);
		$val=" TXT='".$aux."'";
     $sql="UPDATE mainpage SET ".$val." WHERE TYPE=".$_POST['type@main'];
      if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
      $result = $conn->query($sql);}     
	 if(isset($_POST['title@main'])&&strlen($_POST['title@main'])!=0)
	 {$val=" TITLE='".$_POST['title@main']."' ";
      $sql="UPDATE mainpage SET ".$val." WHERE TYPE=".$_POST['type@main'];
     if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     }
     $result = $conn->query($sql);}  
}}
else    	
{$aux=$_POST['txt@main'].$filetxt;
$aux=preg_replace(".\\n.","<br>",$aux);
 if(isset($_POST['title@main'])&&strlen($_POST['title@main'])!=0)
{$sql="INSERT INTO mainpage (TITLE,TXT,IMG) VALUES ('".htmlspecialchars($_POST['title@main'],$flags=ENT_QUOTES|ENT_HTML5)."','".htmlspecialchars($aux,$flags=ENT_QUOTES|ENT_HTML5)."','".$file."')";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($conn->query($sql)==TRUE)
echo "User added";
else {echo "User <b>not</b> added<br>";
     echo "Error: " . $sql . "<br>" . $conn->error."<br>";}}}
 
$conn->close();
echo "Connected successfully";
}
?> 