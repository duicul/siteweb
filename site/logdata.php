<?php
	session_start();
   if(isset($_SESSION['user'])&&isset($_SESSION['name'])&&isset($_SESSION['mail']))
echo $_SESSION['user']." ".$_SESSION['name']." ".$_SESSION['mail'];
   else echo "anonymous";
?>