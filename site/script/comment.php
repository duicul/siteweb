 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dname="site";
if(isset($_GET['aid']))
{$conn=new mysqli($servername,$username,$password,$dname);
	session_start();
$admin=0;
if(isset($_SESSION['user']))
{$sql="SELECT * FROM user WHERE USERNAME='".$_SESSION['user']."'";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
    if($result)
	{$row=mysqli_fetch_assoc($result);
     $admin=$row['ADMIN'];
	}} 
$sql="SELECT * FROM comment WHERE AID='".$_GET['aid']."' ORDER BY DATE DESC ";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
     $result = $conn->query($sql);
    if(!$result)
	{	}
	else
	{$rows = mysqli_fetch_all($result);
	$comms=array_chunk($rows,6);
	function showcomm($comms){
	echo "<span  id=\"#topcomm\">";
	echo "<a class=\"linkbutton point\" onClick=\"showcomm(0);\"><i class=\"fa fa-fast-backward\" ></i></a>";
    echo "<a class=\"linkbutton point\" onClick=\"showprevcomm();\"><i class=\"fa fa-step-backward\" ></i></a>";
	for($i=0;$i<sizeof($comms);$i=$i+1)
	echo "<a class=\"commno".$i." linkbutton point\" onClick=\"showcomm(".$i.");\"><i class=\"fa\">".($i+1)."</i></a>";
	echo "<a class=\"linkbutton point\" onClick=\"shownextcomm();\"><i class=\"fa fa-step-forward\" ></i></a>";
	echo "<a class=\"linkbutton point\" onClick=\"showcomm(".(sizeof($comms)-1).");\"><i class=\"fa fa-fast-forward\" ></i></a>";
    echo "</span>";}
		showcomm($comms);
	for($i=0;$i<sizeof($comms);$i=$i+1)
	{ echo "<div id=\"sectcomm".$i."\" class=\"sections \" style=\"".("")."\" >";
		for($j=0;$j<sizeof($comms[$i]);$j=$j+1)
	{ 
		echo "<div class=\"panel\">"."<div class=\"panel-head\">".$comms[$i][$j][1]."  ".$comms[$i][$j][4]."</div>";
      echo "<div class=\"panel-body\">".$comms[$i][$j][3]."<br>";
      //echo "<span class=\"point\"><i class=\"fa fa-thumbs-o-up\">up</i></span><span class=\"point\"> <i class=\"fa fa-thumbs-down\">down</i></span>";
      if (isset($_SESSION['user'])&&($_SESSION['user']==$rows[$j][1]||($admin==1&&"anonymous"==$comms[$i][$j][1])))
	  {echo "<span class=\"point\" align=\"right\"><i class=\"fa fa-times\" onClick=\"remcom('".$comms[$i][$j][0]."','".$comms[$i][$j][2]."')\">remove</i></span>";}
	echo  "</div></div>";
	}echo "</div>";
	}	
	showcomm($comms);
	}
 $result->close();
}
?> 