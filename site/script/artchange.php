 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
if(!($_SESSION['user']&&isset($_SESSION['user'])&&$_SESSION['admin']==1))
	header('Location: '.$uri.'/site/');
else{
// Create connection
//$conn = new mysqli($servername,$username,$password,$dname);
$conn=new mysqli($servername,$username,$password,$dname);
/*$target_dir=dirname(getcwd())."\img\\";
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
if(isset($_FILES['txtfile@art'])&&$_FILES['txtfile@art']['error'] == UPLOAD_ERR_OK&& is_uploaded_file($_FILES['txtfile@art']['tmp_name']))
{$filetxt=file_get_contents($_FILES['txtfile@art']['tmp_name']);
 echo $filetxt;
}
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
	//header('Location: '.$uri.'/site/');
    //$uploadOk = 0;
}
// Check file size
if ($_FILES["file@art"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
	header('Location: '.$uri.'/site/');
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file@art"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file@art"]["name"]). " has been uploaded.";
		$file=basename( $_FILES["file@art"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
		$file="";
    }
}

if ($uploadOk1 == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file1@art"]["tmp_name"], $target_file1)) {
        echo "The file ". basename( $_FILES["file1@art"]["name"]). " has been uploaded.";
		$file1=basename( $_FILES["file1@art"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
		$file1="";}}

if ($uploadOk2 == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file2@art"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file2@art"]["name"]). " has been uploaded.";
		$file2=basename( $_FILES["file2@art"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
		$file2="";}}

if ($uploadOk3 == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file3@art"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file3@art"]["name"]). " has been uploaded.";
		$file3=basename( $_FILES["file3@art"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
		$file3="";}}

*/
$sql="SELECT * FROM article WHERE ID='".$_POST['aid']."'";
echo $sql."<br>";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
	if($result)
	{$row = mysqli_fetch_assoc($result);}
    else $row=[];
print_r($row);
if(sizeof($row)>0)
{$val="";
    if(isset($_POST['txt@art'])&&strlen($_POST['txt@art'])>2||strlen($filetxt)>0)
	{  $txt=$_POST['txt@art'];
	   $txt=preg_replace('/<br(\s+)?\/?>/i', "\n",$txt);
	 echo $txt."<br>";
	 //
	 $val=" TXT='".htmlentities(htmlspecialchars($txt,$flags=ENT_QUOTES|ENT_HTML5))."'";
     $sql="UPDATE article SET ".$val." WHERE ID='".$_POST['aid']."'";
     //echo $sql."<br>";
      if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
      $result = $conn->query($sql);}  
 
	 if(isset($_POST['title@art'])&&strlen($_POST['title@art'])!=0)
	 {$txt=$_POST['title@art'];
	 $txt=preg_replace('/<br(\s+)?\/?>/i', "\n",$txt);
	 echo $txt."<br>";
	 $val=" TITLE='".htmlentities(htmlspecialchars($txt,$flags=ENT_QUOTES|ENT_HTML5))."'";
      $sql="UPDATE article SET ".$val." WHERE TYPE=".$_POST['type@art'];
     echo $sql."<br>";
     if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     }
     $result = $conn->query($sql);}  
	  echo $_POST['txt@art'];
 
     if(isset($_POST['title@art'])&&strlen($_POST['txt@art'])>2||strlen($filetxt)>0)
	{  $txt=$_POST['title@art'];
	   $txt=preg_replace('/<br(\s+)?\/?>/i', "\n",$txt);
	 echo $txt."<br>";
	 //
	 $val=" TITLE='".htmlentities(htmlspecialchars($txt,$flags=ENT_QUOTES|ENT_HTML5))."'";
     $sql="UPDATE article SET ".$val." WHERE ID='".$_POST['aid']."'";
     //echo $sql."<br>";
      if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
      $result = $conn->query($sql);} 
}}
?> 