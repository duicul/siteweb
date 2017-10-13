var a="point fa fa-star";
var b="point fa fa-star-o";

function showscore(a){if(a<=0)
{str5b();}
 else {if(a==1)
 {str1a();}
 else {if(a==2)
 {str2a();}
 else {if(a==3)
 {str3a();}
 else {if(a==4)
 {str4a();}
 else {str5a();
}}}}}}

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
        xmlhttp.open("GET", "/site/test.py?temp=" + temp+"&humid="+humid+"&heat="+heat, true);
        xmlhttp.send();}

function showCom(aid) {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("comm").innerHTML = this.responseText;
            }
        };
	if(aid!=undefined)
	{xmlhttp.open("GET", "/site/comment.php?aid="+String(aid), true);
        xmlhttp.send();}}

function showstar(aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("star").innerHTML = this.responseText;
            }
        };
	if(aid!=undefined)
	{xmlhttp.open("GET", "/site/showstar.php?aid="+String(aid), true);
        xmlhttp.send();}
	
	
}

function search() {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/site/search.py?search=" + temp, true);
        xmlhttp.send();
    }

function rate(tip){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rank").innerHTML = this.responseText;
            }
        };
	    //alert(tip);
        xmlhttp.open("GET", "/site/rank.py?tip="+tip, true);
        xmlhttp.send();
	
    }

function log(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("log").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "/site/log.php?", true);
        xmlhttp.send();}

function logout(aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("log").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/site/logout.php?", true);
        xmlhttp.send();
	 log();
	 if(len(aid)>0)
	 {showCom(aid);
     showstar(aid);}}

function showuser(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("username").innerHTML = this.responseText;
			}
        };
        xmlhttp.open("GET", "/site/logdata.php", true);
        xmlhttp.send();}

function addcom(user,aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("resp").innerHTML = this.responseText;
			}
        };
	var q="txt="+document.getElementById("addcom").value+"&user="+user+"&aid="+aid;
	if(aid!=undefined)
	{xmlhttp.open("GET", "/site/addcomm.php?"+q, true);
        xmlhttp.send();
	showCom(aid);
	alert(q);}
	 log();
	 document.getElementById("addcom").value="";}

function remcom(cid,aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("resp").innerHTML = this.responseText;
			}
        };
	var q="cid="+cid;
	alert(q);
	if(cid!=undefined)
	{xmlhttp.open("GET", "/site/remcomm.php?"+q, true);
	 xmlhttp.send();
	showCom(aid);}
	 log();}

function artins(){
	var xmlhttp = new XMLHttpRequest();
	document.getElementById("test").innerHTML="gogu";
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("test").innerHTML = this.responseText+"artins.php?fname="+document.getElementById("fname@art").value+"&title="+document.getElementById("title@art").value+"&type="+document.getElementById("type@art").value;
			}
        };
        xmlhttp.open("GET", "/site/artins.php?fname="+document.getElementById("fname@art").value+"&title="+document.getElementById("title@art").value+"&type="+document.getElementById("type@art").value, true);
        xmlhttp.send();}

function link(){
	    var a ="<ul class=\"navbar-nav mr-auto\"\>";
	    a+="<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/bus/\">Business </a></li>";
		a+="<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/div/\">Divertisment </a></li>";
		a+="<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/spo/\">Sport </a></li>";
		a+="<li class=\"nav-link\"><a class=\"linkbutton\" href=\"/site/gen/\">General </a></li>";
	    a+="</ul>";
        document.getElementById("link").innerHTML=a;}

function start(tip,aid,user){
	rate(tip);
	showCom(aid);
	getscore(aid);
	log();
	link();
    showstar(aid);
    }
    
function rating(val,aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("sol").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/site/rate.php?val="+val+"&aid="+aid, true);
        xmlhttp.send();
	 log();
     showCom(aid);
     getscore(aid);
     showstar(aid);} 

function getscore(aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("score").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/site/getscore.php?aid="+aid, true);
        xmlhttp.send();
	 log();
     showCom(aid);
     } 

function str1a(){
	document.getElementById("star1").className=a;
}

function str1b(){
	document.getElementById("star1").className=b;
}

function str2a(){
	str1a();
	document.getElementById("star2").className=a;
}

function str2b(){
	str1b();
	document.getElementById("star2").className=b;
}

function str3a(){
	str2a();
	document.getElementById("star3").className=a;
}

function str3b(){
	str2b();
	document.getElementById("star3").className=b;}

function str4a(){
	str3a();
	document.getElementById("star4").className=a;}

function str4b(){
	str3b();
	document.getElementById("star4").className=b;}

function str5a(){
	str4a();
	document.getElementById("star5").className=a;}

function str5b(){
	str4b();
	document.getElementById("star5").className=b;}