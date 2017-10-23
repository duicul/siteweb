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

function logdata(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("logdata").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "/site/script/logdata.php?", true);
        xmlhttp.send();}

function log(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("log").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "/site/script/log.php?", true);
        xmlhttp.send();
        logdata();}

function login(){
	var url =  "/site/script/login.php";
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				if(this.responseText.length>2)
				{  document.getElementById("loginresp").className="alert alert-danger";
				   document.getElementById("loginresp").innerHTML = this.responseText;
				}
                else {$("#loginModal").modal("toggle");
					 logdata();
                     log();
					}
			}};
	var username = document.getElementById("userlogin").value;
	var password = document.getElementById("passwordlogin").value;
    var formData = new FormData();
    formData.append("password", password);
	formData.append("user",username);
    xmlhttp.open("POST",url, true);
    xmlhttp.send(formData);}

function signup(){
	var url =  "/site/script/signup.php";
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
			}};
	var username =$("#usersignup").val();//document.getElementById("usersignup").value;
	var password = $("#passwordsignup").val();//document.getElementById("passwordsignup").value;
	var name = $("#namesignup").val(); //document.getElementById("namesignup").value;
	var mail = $("#mailsignup").val(); //document.getElementById("mailsignup").value;
    var formData = new FormData();
	var pattmail = /.+@.+\..+/;
    formData.append("password", password);
	formData.append("user",username);
	formData.append("name",name);
	formData.append("mail",mail);
	if( name.length<3)
	{$("#passresp").html("Enter your name");}
	else{if(username.length===0 )
	{$("#passresp").html("Enter Username");}
    else{
	if(password.length<5)
	{$("#passresp").html("Enter longer password : min 5 characters");}
	else{
	if(password!=$("#passwordsignup1").val())
	{$("#passresp").html("Retype password");}
	else {
	if(!pattmail.test(mail))
	{$("#passresp").html("Enter valid e-mail address");}
	else {
	if(password===$("#passwordsignup1").val())
	{$("#signupModal").modal("toggle");
	log();
	logdata();
	xmlhttp.open("POST",url, true);
    xmlhttp.send(formData);
	xmlhttp.close();
	} } } } } }
}

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
                //document.getElementById("resp").innerHTML = this.responseText;
				showCom(aid);
			}
        };
	var q="txt="+document.getElementById("addcom").value+"&user="+user+"&aid="+aid;
	if(aid!=undefined)
	{xmlhttp.open("GET", "/site/script/addcomm.php?"+q, true);
        xmlhttp.send();
	alert(q);}
	 log();
	 document.getElementById("addcom").value="";}

function remcom(cid,aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               // document.getElementById("resp").innerHTML = this.responseText;
			}
        };
	var q="cid="+cid;
	alert(q);
	if(cid!=undefined)
	{xmlhttp.open("GET", "/site/script/remcomm.php?"+q, true);
	 xmlhttp.send();
	showCom(aid);}
	 log();}

function testpass(){
	var a=document.getElementById("passwordsignup").value;
var b=document.getElementById("passwordsignup1").value;
 if(a!==b&&b.length>=3)
 {$("#passresp").html("Password does not match");}
 else {$("#passresp").html("");}
	 
}

function artins(){
	var url = "/site/script/artinschange.php";
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);			}
        };
	console.log($("#appendart").is(":checked"));
	if($("#typeart").val().length==3&&($("#titleart").val().length>=3||$("#artbytype").val().length!=0))
	{var file = document.getElementById("fileart").files[0];
	 var file1 = document.getElementById("fileart1").files[0];
	 var file2 = document.getElementById("fileart2").files[0];
	 var file3 = document.getElementById("fileart3").files[0];
	 //console.log(file);
	 var filetxt = document.getElementById("txtfileart").files[0];
    var formData = new FormData();
    formData.append("file@art", file);
	formData.append("file1@art", file1);
    formData.append("file2@art", file2);
	formData.append("file3@art", file3);
	formData.append("txtfile@art", filetxt);
	formData.append("append@art", $("#appendart").is(":checked")?"1":"0");
	console.log($("#artbytype").val());
	formData.append("title@art",$("#artbytype").val().length==0?$("#titleart").val():$("#artbytype").val());
	formData.append("type@art", $("#typeart").val());
	formData.append("txt@art", $("#txtart").val());
    xmlhttp.open("POST",url, true);
    xmlhttp.send(formData);
	$("#artinsModal").modal("toggle");
	}}

function mainins(){
	var url = "/site/script/mainchange.php";
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
			    link();}
        };
	if(document.getElementById("type@main").value.length>0)
	{var file = document.getElementById("file@main").files[0];
    var formData = new FormData();
    formData.append("file@main", file);
	formData.append("title@main", document.getElementById("title@main").value);
	formData.append("type@main", document.getElementById("type@main").value);
	formData.append("txt@main", document.getElementById("txt@main").value);
    xmlhttp.open("POST",url, true);
    xmlhttp.send(formData);}}

function listdel(tip){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("artdel").innerHTML = this.responseText;
			}
        };
        xmlhttp.open("GET", "/site/script/artlistdel.php?tip="+tip, true);
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
        listdel('all');
	    score('all');
        }

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
                $(".link").html(this.responseText);
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

function getartbytype(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				$("#artbytype").html($("#artbytype").html+this.responseText);
			}
        };
	    tip=$("#typeart").val();
	    if(tip!="none")
		{xmlhttp.open("GET", "/site/script/getartbytype.php?tip="+tip, true);
        xmlhttp.send();}}

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
               // document.getElementById("sol").innerHTML = this.responseText;
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