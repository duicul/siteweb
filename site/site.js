var user="0";
var nam="1";
var mail="2";
var aux;
function showHint() {
    var xmlhttp = new XMLHttpRequest();
	var temp=document.getElementById("temp").value;
	var humid=document.getElementById("humid").value;
	var heat=document.getElementById("heat").value;
	document.getElementById("txtHint").innerHTML = temp+" "+humid+" "+heat;
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "test.py?temp=" + temp+"&humid="+humid+"&heat="+heat, true);
        xmlhttp.send();
    }
function showCom() {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("comm").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "comment.py?aid=gennou", true);
        xmlhttp.send();
    }
function search() {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "search.py?search=" + temp, true);
        xmlhttp.send();
    }
function rate(){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rank").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "rank.py?", true);
        xmlhttp.send();
	
    }
function log()
	{var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("log").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "log.php?", true);
        xmlhttp.send();
	 showuser();
	}
function logout()
	{var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("log").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "logout.php?", true);
        xmlhttp.send();
	 log();
	}
function showuser(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("username").innerHTML = this.responseText;
			}
        };
        xmlhttp.open("GET", "logdata.php", true);
        xmlhttp.send();
	
}
function addcom(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("test").innerHTML = this.responseText;
			}
        };
        xmlhttp.open("GET", "addcomm.php?txt="+document.getElementById("addcom").value, true);
        xmlhttp.send();
	showCom();
	 log();}

function artins(){
	var xmlhttp = new XMLHttpRequest();
	document.getElementById("test").innerHTML="gogu";
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("test").innerHTML = this.responseText+"artins.php?fname="+document.getElementById("fname@art").value+"&title="+document.getElementById("title@art").value+"&type="+document.getElementById("type@art").value;
			}
        };
        xmlhttp.open("GET", "artins.php?fname="+document.getElementById("fname@art").value+"&title="+document.getElementById("title@art").value+"&type="+document.getElementById("type@art").value, true);
        xmlhttp.send();}

function link()
{	    var a ="<ul class=\"navbar-nav mr-auto\"\>";
	    a+="<li class=\"nav-link\"><a href=\"/site/bus/\">Business </a></li>";
		a+="<li class=\"nav-link\"><a href=\"/site/div/\">Divertisment </a></li>";
		a+="<li class=\"nav-link\"><a href=\"/site/spo/\">Sport </a></li>";
		a+="<li class=\"nav-link\"><a href=\"/site/gen/\">General </a></li>";
	    a+="</ul>";
        document.getElementById("link").innerHTML=a;	
}
function start(){
	rate();
	showCom();
	log();
	link();
}