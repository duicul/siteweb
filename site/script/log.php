<?php
	session_start();
            echo "<ul class=\"nav navbar-nav navbar-right mr-auto\">";
            
               if(isset($_SESSION['name']))
          {echo "<li class=\"nav-link\">  Hello ".$_SESSION['name']." ".$_SESSION['mail']."</li>";
		   if($_SESSION['admin']==1)
		   {echo "<li class=\"nav-link\"><div class=\"dropdown\"><button class=\"btn btn-default\" type=\"button\" data-toggle=\"dropdown\">Admin</button><ul class=\"dropdown-menu\">
      <li><a class=\"linkbutton\" href=\"/site/admin.php\">Add/change article</a></li> 
	  <li><a class=\"linkbutton\" href=\"/site/adminlistdel.php\">Remove article</a></li> <li><a class=\"linkbutton\" href=\"/site/adminmainchange.php\">Change main page</a></li> </div></li>";}
		   echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/script/logout.php\" >Logout</a></li>"; 
		  }
	      else { echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/login.html\">Login</a></li>";
	             echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/signup.html\">Signup</a></li>";}
        echo "</ul>";

?>