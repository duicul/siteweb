<?php
	session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dname="site";
    $conn=new mysqli($servername,$username,$password,$dname);
    $sql="SELECT * FROM mainpage WHERE TYPE!='all'";
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $result = $conn->query($sql);
	$rows = mysqli_fetch_all($result);
    echo "<ul class=\"navbar-nav mr-auto\">";
    foreach($rows as $row)
	{echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/pagemain.php?tip=";
	 echo $row[0];
	 echo "\">".$row[1]." </a></li>";	
	}
    echo "</ul>";
      ?>