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
        xmlhttp.open("GET", "/site/script/test.py?temp=" + temp+"&humid="+humid+"&heat="+heat, true);
        xmlhttp.send();}

function showCom(aid) {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("comm").innerHTML = this.responseText;
            }
        };
	if(aid!=undefined)
	{xmlhttp.open("GET", "/site/script/comment.php?aid="+String(aid), true);
        xmlhttp.send();}}

function showstar(aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("star").innerHTML = this.responseText;
            }
        };
	if(aid!=undefined)
	{xmlhttp.open("GET", "/site/script/showstar.php?aid="+String(aid), true);
        xmlhttp.send();}
	
	
}

function search() {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/site/script/search.py?search=" + temp, true);
        xmlhttp.send();
    }

function rate(tip){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rank").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/site/script/rank.py?tip="+tip, true);
        xmlhttp.send();
	
    }

function score(tip){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("topscore").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/site/script/score.php?tip="+tip, true);
        xmlhttp.send();
	
    }

function log(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("log").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "/site/script/log.php?", true);
        xmlhttp.send();}

function logout(aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("log").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/site/script/logout.php?", true);
        xmlhttp.send();
	 log();
	 if(aid!=undefined)
	 {showCom(aid);
     showstar(aid);}}

function loadsearch(tip){
	 var q="<form action=\"/site/script/search.php\" method=\"get\" class=\"navbar-form navbar-left\">";
	    q+="<div class=\"input-group\">"; 
		q+="<input type=\"search\" class=\"form-control\" placeholder=\"Search\" name=\"search\">";
	    q+="<input type=\"hidden\" name=\"tip\" value=\""+tip+"\">";
		q+="<div class=\"input-group-btn\">";
		q+="<button type=\"submit\" class=\"btn btn-default\">Search</button>";
		q+="</div></div></form>";
	document.getElementById("loadsearch").innerHTML=q;}

function showuser(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("username").innerHTML = this.responseText;
			}
        };
        xmlhttp.open("GET", "/site/script/logdata.php", true);
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
	{xmlhttp.open("GET", "/site/script/addcomm.php?"+q, true);
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
	{xmlhttp.open("GET", "/site/script/remcomm.php?"+q, true);
	 xmlhttp.send();
	showCom(aid);}
	 log();}

function artins(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("test").innerHTML = this.responseText+"artins.php?fname="+document.getElementById("fname@art").value+"&title="+document.getElementById("title@art").value+"&type="+document.getElementById("type@art").value;
			}
        };
        xmlhttp.open("GET", "/site/script/artins.php?fname="+document.getElementById("fname@art").value+"&title="+document.getElementById("title@art").value+"&type="+document.getElementById("type@art").value, true);
        xmlhttp.send();}

function listdel(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("artdel").innerHTML = this.responseText;
			}
        };
        xmlhttp.open("GET", "/site/script/artlistdel.php?", true);
        xmlhttp.send();}

function mainlistdel(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("maindel").innerHTML = this.responseText;
			}
        };
        xmlhttp.open("GET", "/site/script/mainlistdel.php", true);
        xmlhttp.send();}

function artdel(aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("test").innerHTML = this.responseText;
			}
        };
        xmlhttp.open("GET", "/site/script/artdel.php?aid="+aid, true);
        xmlhttp.send();
        listdel();}

function maindel(tip){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("test").innerHTML = this.responseText;
			}
        };
        xmlhttp.open("GET", "/site/script/maindel.php?tip="+tip, true);
        xmlhttp.send();
        mainlistdel();
        link();}

function link(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("link").innerHTML = this.responseText;
			}
        };
        xmlhttp.open("GET", "/site/script/category.php", true);
        xmlhttp.send();}

function startmain(tip){
	rate(tip);
	score(tip);
    log();
	link();
	loadsearch(tip);}

function start(tip,aid,user){
	rate(tip);
	score(tip);
	showCom(aid);
	getscore(aid);
	log();
	link();
	loadsearch(tip);
    showstar(aid);
    }
    
function rating(val,aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("sol").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/site/script/rate.php?val="+val+"&aid="+aid, true);
        xmlhttp.send();
	 log();
     showCom(aid);
     getscore(aid);
     showstar(aid);
     //score();
} 

function getscore(aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("score").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/site/script/getscore.php?aid="+aid, true);
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