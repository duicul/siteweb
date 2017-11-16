<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
//echo "change";
if(!($_SESSION['user']&&isset($_SESSION['user'])&&$_SESSION['admin']==1))
	header('Location: '.$uri.'/site/');
else {$conn=@new mysqli($servername,$username,$password,$dname);
$target_dir=dirname(getcwd())."\img\\";
$target_file = $target_dir . basename($_FILES["file@art"]["name"]);
$uploadOk = 1;
$filename=pathinfo($target_file,PATHINFO_FILENAME);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$target_file1 = $target_dir . basename($_FILES["file1@art"]["name"]);
$uploadOk1 = 1;
$filename1=pathinfo($target_file1,PATHINFO_FILENAME);
$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);

$target_file2 = $target_dir . basename($_FILES["file2@art"]["name"]);
$uploadOk = 1;
$filename2=pathinfo($target_file2,PATHINFO_FILENAME);
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);

$target_file3 = $target_dir . basename($_FILES["file3@art"]["name"]);
$uploadOk3 = 1;
$filename3=pathinfo($target_file3,PATHINFO_FILENAME);
$imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);

$filetxt="";
if($_FILES['txtfile@art']['error'] == UPLOAD_ERR_OK&& is_uploaded_file($_FILES['txtfile@art']['tmp_name']))
{$filetxt=file_get_contents($_FILES['txtfile@art']['tmp_name']);
 //echo $filetxt;
}
if (file_exists($target_file)) {
   // echo "Sorry, file already exists.";
}
if ($_FILES["file@art"]["size"] > 5000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
	header('Location: '.$uri.'/site/');
}
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file@art"]["tmp_name"], $target_file)) {
       // echo "The file ". basename( $_FILES["file@art"]["name"]). " has been uploaded.";
		$file=basename( $_FILES["file@art"]["name"]);
    } else {
        //echo "Sorry, there was an error uploading your file.";
		$file="";
    }
}

if ($uploadOk1 == 0) {
    //echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file1@art"]["tmp_name"], $target_file1)) {
        //echo "The file ". basename( $_FILES["file1@art"]["name"]). " has been uploaded.";
		$file1=basename( $_FILES["file1@art"]["name"]);
    } else {
        //echo "Sorry, there was an error uploading your file.";
		$file1="";}}

if ($uploadOk2 == 0) {
    //echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file2@art"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["file2@art"]["name"]). " has been uploaded.";
		$file2=basename( $_FILES["file2@art"]["name"]);
    } else {
        //echo "Sorry, there was an error uploading your file.";
		$file2="";}}

if ($uploadOk3 == 0) {
    //echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file3@art"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["file3@art"]["name"]). " has been uploaded.";
		$file3=basename( $_FILES["file3@art"]["name"]);
    } else {
        //echo "Sorry, there was an error uploading your file.";
		$file3="";}}


$sql="SELECT * FROM article WHERE TITLE='".$_POST['title@art']."' AND TYPE=".$_POST['type@art'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	if($result)
	{$row = mysqli_fetch_assoc($result);
        if($_POST['append@art']=="1")
		$txt=$row['TXT'];
	    else $txt="";}
    else $row=[];
//echo $_POST['newtitle@art'];
//echo $sql;
if(sizeof($row)>0)
{$val="";
	if(strlen($file)!=0)
	{$val=" IMG='".$file."'";
    $sql="UPDATE article SET ".$val." WHERE ID='".$row['ID']."'";
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
     $result = $conn->query($sql);} 
 
    if(isset($_POST['txt@art'])&&strlen($_POST['txt@art'])>2||strlen($filetxt)>0)
	{  $aux=$_POST['txt@art'];
		$txt=$txt.$filetxt.$aux;
	 $val=" TXT='".$txt."'";
     $sql="UPDATE article SET ".$val." WHERE ID='".$row['ID']."'";
      if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
      $result = $conn->query($sql);}  
   echo $_POST['newtitle@art'];
	 if(isset($_POST['newtitle@art'])&&strlen($_POST['newtitle@art'])!=0)
	 {$val=" TITLE='".$_POST['newtitle@art']."' ";
      $sql="UPDATE article SET ".$val." WHERE ID='".$row['ID']."'";
      //echo $sql;
     if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     }
     $result = $conn->query($sql);}  
}
else    	
{if(isset($_POST['title@art'])&&strlen($_POST['title@art'])!=0)
{$aux=$filetxt.$_POST['txt@art'];
$sql="INSERT INTO article (ID,TITLE,TYPE,TXT,IMG,USERNAME,IMG1,IMG2,IMG3) VALUES (UUID(),'".htmlspecialchars($_POST['title@art'],$flags=ENT_QUOTES|ENT_HTML5)."',".$_POST['type@art'].",'".htmlentities(htmlspecialchars($aux,$flags=ENT_QUOTES|ENT_HTML5))."','".$file."','".$_SESSION['user']."','".$file1."','".$file2."','".$file3."')";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($conn->query($sql)==TRUE)
echo "User added";
else {echo "User <b>not</b> added<br>";}}}
$conn->close();
echo "Connected successfully";
}
?> 