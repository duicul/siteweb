<?php
	session_start();
   if(isset($_SESSION['user'])&&isset($_SESSION['name'])&&isset($_SESSION['mail']))
echo "<span style=\"color:white;\">".$_SESSION['name']." ".$_SESSION['user']." ".$_SESSION['mail']."</span>";
   else echo "<span style=\"color:white;\">anonymous</span>";
?>