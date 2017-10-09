<?php
	session_start();
            echo "<ul class=\"nav navbar-nav navbar-right mr-auto\">";
            
               if(isset($_SESSION['name']))
          {echo "<li class=\"nav-link\">  Hello ".$_SESSION['name']." ".$_SESSION['mail']."</li>";
		   echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"#\" onClick=\"logout();\">Logout</a></li>"; 
		  }
	      else { echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/login.html\">Login</a></li>";
	             echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/signup.html\">Signup</a></li>";}
        echo "</ul>";

?>