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
	if($result)
		$rows = mysqli_fetch_all($result);
	else $rows=[];          
            if(isset($_SESSION['name']))
			{if($_SESSION['admin']==1)
			{echo "<div class=\"modal fade\" id=\"adminModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">";
            echo "<div class=\"modal-dialog\"><div class=\"modal-content\" style=\"padding:25px;\">";
             echo "<div class=\"container-fluid\" align=\"center\">";
            echo "<h3 align=\"center\">Admin commands</h3><br/>";
            echo "<a class=\"btn btn-default\" href=\"#\" data-toggle=\"modal\" data-target=\"#artinschangeModal\">Add/Change article</a><br>";
			echo "<a class=\"btn btn-default\" href=\"#\" data-toggle=\"modal\" data-target=\"#artdelModal\" onClick=\"listdel('all')\">Remove article</a><br>"; 
			echo "<a class=\"btn btn-default\" href=\"#\" data-toggle=\"modal\" data-target=\"#mainchangeModal\">Add/Change main page</a><br>";
			echo "<a class=\"btn btn-default\" href=\"#\" data-toggle=\"modal\" data-target=\"#maindelModal\" onClick=\"mainlistdel();\">Delete main page</a><br>";
            echo "</form></div></div></div></div>";
			
			echo "<div class=\"modal fade\" id=\"artinschangeModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">";
            echo "<div class=\"modal-dialog\" style=\"width:700px;\">";
			echo "<div class=\"modal-content\" style=\"padding:25px;width:700px;\">";
             echo "<div class=\"container-fluid\" align=\"center\">";
            echo "<h3 align=\"center\">Add/chnage article</h3><br/>";
			echo "<a class=\"btn btn-default\" href=\"#\" data-toggle=\"modal\" data-target=\"#artinschangeModal\">Back</a><br>";
			echo "Photo: <input type=\"file\" id=\"file@art\"/>  <br />";
			echo "<input type=\"text\" id=\"title@art\" placeholder=\"Title\"/>  <br />";
		    echo "<select id=\"type@art\">";
			 foreach($rows as $row)
	         echo "<option value=\"".$row[0]."\">".$row[1]."</option>";
            echo "</select>  <br />";
			echo "<textarea id=\"txt@art\" placeholder=\"Text\" maxlength=\"2000\" cols=\"60\" rows=\"20\" required required ></textarea>  <br />";
            echo "<a class=\"btn btn_mod\" href=\"#\" data-toggle=\"modal\" data-target=\"#artinschangeModal\" onClick=\"artins();\" >Create/Change</a><br>";
            echo "</div></div></div></div>"; 
			 
			echo "<div class=\"modal fade\" id=\"artdelModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">";
            echo "<div class=\"modal-dialog\"><div class=\"modal-content\" style=\"padding:25px;\">";
             echo "<div class=\"container-fluid\" align=\"center\">";
            echo "<h3 align=\"center\">Remove article</h3><br/>";
            echo "<a class=\"btn btn-default\" href=\"#\" data-toggle=\"modal\" data-target=\"#artdelModal\">Back</a><br>";
		    echo "<select onChange=\"listdel(this.value)\" id=\"seltip\">";
			 foreach($rows as $row)
	         echo "<option value=\"".$row[0]."\">".$row[1]."</option>";
            echo "</select>  <br />";
			echo "<p id=\"artdel\"></p>";
            echo "</form></div></div></div></div>";
			 
			echo "<div class=\"modal fade\" id=\"mainchangeModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">";
            echo "<div class=\"modal-dialog\" style=\"width:700px;\">";
			echo "<div class=\"modal-content\" style=\"padding:25px;width:700px;\">";
             echo "<div class=\"container-fluid\" align=\"center\">";
            echo "<h3 align=\"center\">Create/Change Main Page</h3><br/>";
			echo "<a class=\"btn btn-default\" href=\"#\" data-toggle=\"modal\" data-target=\"#mainchangeModal\">Back</a><br>";
			echo "Photo: <input type=\"file\" id=\"file@main\"/>  <br />";
			echo "<input type=\"text\" id=\"title@main\" placeholder=\"Title\"/>  <br />";
			echo "<input type=\"text\" id=\"type@main\" placeholder=\"Type\"/>  <br />";
		    echo "Types: ";
			 foreach($rows as $row)
	         echo $row[0]." ";
            echo "<br />";
			echo "<textarea id=\"txt@main\" placeholder=\"Text\" maxlength=\"2000\" cols=\"60\" rows=\"20\" required ></textarea>  <br />";
            echo "<a class=\"btn btn_mod\" href=\"#\" data-toggle=\"modal\" data-target=\"#mainchangeModal\" onClick=\"mainins();\" >Create/Change</a><br>";
            echo "</div></div></div></div>"; 
			 
			echo "<div class=\"modal fade\" id=\"maindelModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">";
            echo "<div class=\"modal-dialog\"><div class=\"modal-content\" style=\"padding:25px;\">";
             echo "<div class=\"container-fluid\" align=\"center\">";
			 echo "<script >mainlistdel();</script>";
            echo "<h3 align=\"center\">Remove Main Page</h3><br/>";
            echo "<a class=\"btn btn-default\" href=\"#\" data-toggle=\"modal\" data-target=\"#maindelModal\">Back</a><br>";
		    echo "<p id=\"maindel\">ded</p>";
            echo "</div></div></div></div>";
			}}
			else
			{echo "<div class=\"modal fade\" id=\"loginModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">";
            echo "<div class=\"modal-dialog\"><div class=\"modal-content\" style=\"padding:25px;\">";
             echo "<div class=\"container-fluid\" align=\"center\">";
            echo "<h3 align=\"center\">Login into account</h3><br/>";
            echo "<input type=\"text\" id=\"userlogin\" placeholder=\"Username\" class=\"form-control\">  <br />";
            echo "<input type=\"password\" id=\"passwordlogin\" placeholder=\"Password\" class=\"form-control\"><br/>"; 
            echo "<a href=\"#\" align=\"center\" class=\"btn btn_mod\" onClick=\"login();\"/> Login </a> ";
	        echo "<div role=\"alert\" id=\"loginresp\"></div>";
            echo "</div></div></div></div>";

            echo "<div class=\"modal fade\" id=\"signupModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">";
            echo "<div class=\"modal-dialog\"><div class=\"modal-content\" style=\"padding:25px;\">";
             echo "<div class=\"container-fluid\" align=\"center\">";
            echo "<h3 align=\"center\">Create an account</h3><br/>";
            echo "<input type=\"text\" id=\"namesignup\" placeholder=\"Name\" class=\"form-control\">  <br />";
            echo "<input type=\"text\" id=\"usersignup\" placeholder=\"Username\" class=\"form-control\">  <br />";
            echo "<input type=\"password\" id=\"passwordsignup\" placeholder=\"Password\" class=\"form-control\" id=\"pass1\"><br/>";
            echo "<input type=\"password\" id=\"passwordsignup1\" placeholder=\"Retype Password\" class=\"form-control\" id=\"pass2\" onKeyUp=\"testpass()\"><br/>";
            echo "<p id=\"passresp\" style=\"color:red;\"></p>";
            echo "<input type=\"email\" id=\"mailsignup\" placeholder=\"E-mail\" class=\"form-control\"><br/>";          
            echo "<a href=\"#\" class=\"btn btn_mod\" onClick=\"signup();\"/> Login </a> ";
            echo "</div></div></div></div>";}
			

            echo "<ul class=\"nav navbar-nav navbar-right mr-auto\">";            
               if(isset($_SESSION['name']))
          { if($_SESSION['admin']==1)
		   {echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"#\" data-toggle=\"modal\" data-target=\"#adminModal\">Admin</a></li>";
		   }
		   echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/script/logout.php\" >Logout</a></li>"; 
		  }
	      else { echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"#\" data-toggle=\"modal\" data-target=\"#loginModal\">Login</a></li>";
	             echo "<li class=\"nav-link\"><a class=\"linkbutton\" href=\"#\" data-toggle=\"modal\" data-target=\"#signupModal\">Signup</a></li>";}
        echo "</ul>";

?>