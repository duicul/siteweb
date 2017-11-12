<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
if(!($_SESSION['user']&&isset($_SESSION['user'])&&$_SESSION['admin']==1))
	header('Location: '.$uri.'/site/');
else {$conn=new mysqli($servername,$username,$password,$dname);
$filetxt="";
if($_FILES['txtfile@main']['error'] == UPLOAD_ERR_OK&& is_uploaded_file($_FILES['txtfile@main']['tmp_name']))
{$filetxt=file_get_contents($_FILES['txtfile@main']['tmp_name']);
}	  
	  
if($_POST['type@main']!=-1)
{$sql="SELECT * FROM txttrans WHERE TYPE=".$_POST['type@trans']." AND LANG='".$_POST['lang@trans']."'";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	if($result)
		$row = mysqli_fetch_assoc($result);
    else $row=[];
if(sizeof($row)>0)
{$val="";
    if(isset($_POST['txt@trans'])&&strlen($_POST['txt@trans'])>2||isset($filetxt)&&strlen($filetxt)>2)
	{$aux=$_POST['txt@trans'].$filetxt;
     $aux=htmlspecialchars($aux,$flags=ENT_QUOTES|ENT_HTML5);
		$val=" TXT='".$aux."'";
     $sql="UPDATE txttrans SET ".$val." WHERE TYPE=".$_POST['type@trans']." AND LANG='".$_POST['lang@trans']."'";
      if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
      $result = $conn->query($sql);}     
	 if(isset($_POST['title@trans'])&&strlen($_POST['title@trans'])!=0)
	 {$val=" TITLE='".$_POST['title@trans']."' ";
      $sql="UPDATE txttrans SET ".$val." WHERE TYPE=".$_POST['type@trans']." AND LANG='".$_POST['lang@trans']."'";
     if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     }
     $result = $conn->query($sql);}  
}}
else    	
{$aux=$_POST['txt@trans'].$filetxt;
$aux=preg_replace(".\\n.","<br>",$aux);
$sql="INSERT INTO trans (TYPE,TITLE,TXT) VALUES ('".$_POST['type@trans']."','".htmlspecialchars($_POST['title@trans'],$flags=ENT_QUOTES|ENT_HTML5)."','".htmlspecialchars($aux,$flags=ENT_QUOTES|ENT_HTML5)."')";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($conn->query($sql)==TRUE)
echo "User added";
else {echo "User <b>not</b> added<br>";
     echo "Error: " . $sql . "<br>" . $conn->error."<br>";}
 
$conn->close();
echo "Connected successfully";
}}
?> 