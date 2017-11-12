<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
if(!isset($_SESSION['user']))
	header('Location: '.$uri.'/site/');
$conn=new mysqli($servername,$username,$password,$dname);
$target_dir=getcwd()."/img/";
$target_file = $target_dir . basename($_FILES["file@art"]["name"]);
$uploadOk = 1;
$filename=pathinfo($target_file,PATHINFO_FILENAME);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
}
if ($_FILES["file@art"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	header('Location: '.$uri.'/site/');
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file@art"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file@art"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$aux=$_POST['txt@art'];
$aux=preg_replace(".\\n.","<br/>",$aux);
$sql="INSERT INTO article (TITLE,TYPE,TXT,IMG,USERNAME) VALUES ('".$_POST['title@art']."',".$_POST['type@art'].",'".$aux."','".$filename.".".$imageFileType."','".$_SESSION['user']."')";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($conn->query($sql)==TRUE)
echo "User added";
else {echo "User <b>not</b> added<br>";
     echo "Error: " . $sql . "<br>" . $conn->error."<br>";}
 
$conn->close();
echo "Connected successfully";

?> 