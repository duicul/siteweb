<?php
	session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dname="site";
    $conn=new mysqli($servername,$username,$password,$dname);
    $sql="SELECT * FROM mainpage";
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
	$rows = mysqli_fetch_all($result);
   echo "<ul class=\"navbar-nav mr-auto\">";
    echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/\"><i class=\"fa\" aria-hidden=\"true\">".$rows[0][1]."</i></a></li>";
    $cat=array();
     echo "<li class=\"nav-link linkbutton point\" href=\"#\" onClick=\"nextcat();\" ><i class=\"fa fa-arrow-down\" aria-hidden=\"true\"></i></li>";
	for($i=1;$i<sizeof($rows);$i=$i+1)
	{array_push($cat,$rows[$i]);}
	$sect=array_chunk($cat,4);
    for($i=0;$i<sizeof($sect);$i=$i+1)
	{echo "<li class=\"nav-link sectioncat sectcat".$i."\" style=\"".($i==0?"display:block":"display:none")."\">";
   for($j=0;$j<sizeof($sect[$i]);$j=$j+1)
   {echo "<a class=\"linkbutton\" href=\"/site/pagemain.php?tip=";
	 echo $sect[$i][$j][0];
	 echo "\"><i class=\"fa\" aria-hidden=\"true\">".$sect[$i][$j][1]."</i></a>";
	}
   echo "</li>";
   }
   echo "<li class=\"nav-link linkbutton point\" href=\"#\" onClick=\"prevcat();\" ><i class=\"fa fa-arrow-up\" aria-hidden=\"true\"></i></li>";

   echo "</ul>";
      ?>