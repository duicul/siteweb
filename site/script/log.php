<?php
	session_start();
            echo "<ul class=\"nav navbar-nav navbar-right mr-auto\">";
            
               if(isset($_SESSION['name']))
          {echo "<li class=\"nav-link\">  Hello ".$_SESSION['name']." ".$_SESSION['mail']."</li>";
		   if($_SESSION['admin']==1)
		   {echo "<li class=\"nav-link\"><div class=\"dropdown\"><button class=\"btn btn-default\" type=\"button\" data-toggle=\"dropdown\">Admin</button><ul class=\"dropdown-menu\">";
			echo "<li><a class=\"linkbutton\" href=\"/site/admin.php\">Add/Change article</a></li>";
			echo "<li><a class=\"linkbutton\" href=\"/site/adminlistdel.php\">Remove article</a></li>"; 
			echo "<li><a class=\"linkbutton\" href=\"/site/adminmainchange.php\">Add/Change main page</a></li>";
			echo "<li><a class=\"linkbutton\" href=\"/site/adminmainlistdel.php\">Delete main page</a></li>";
			echo "</div></li>";}
		   echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/script/logout.php\" >Logout</a></li>"; 
		  }
	      else { echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/login.html\">Login</a></li>";
	             echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/signup.html\">Signup</a></li>";}
        echo "</ul>";

?>