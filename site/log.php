<?php
	session_start();
            echo "<ul class=\"nav navbar-nav navbar-right mr-auto\">";
            
               if(isset($_SESSION['name']))
          {echo "<li class=\"nav-link\">  Hello ".$_SESSION['name']." ".$_SESSION['mail']."</li>";
		   if($_SESSION['admin']==1)
		   {echo "<li class=\"nav-link\"><div class=\"dropdown\"><button class=\"btn btn-default\" type=\"button\" data-toggle=\"dropdown\">Admin</button><ul class=\"dropdown-menu\">
      <li><a class=\"linkbutton\" href=\"/site/admin.html\">Add article</a></li> 
	  <li><a class=\"linkbutton\" href=\"#\">Remove article</a></li></div></li>";}
		   echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"#\" onClick=\"logout('";
		   if(isset($_SESSION['aid']))
			  {echo $_SESSION['aid'];}
		   echo "');\">Logout</a></li>"; 
		  }
	      else { echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/login.html\">Login</a></li>";
	             echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/signup.html\">Signup</a></li>";}
        echo "</ul>";

?>