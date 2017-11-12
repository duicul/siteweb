var a="point fa fa-star";
var b="point fa fa-star-o";
var elPos ;
var caid;
var page=0;
var comm=0;
var cat=0;

function changelang(lang){
	console.log(lang);
	console.log(window.location+"?lang="+lang);
	
}

function showcat(init){
	$(".sectcat"+cat).css("display","none");
	$(".sectcat"+init).css("display","block");
	cat=init;}
	
function prevcat(){
	if($(".sectcat"+(cat-1)).length)
	{showcat(cat-1);}}
	
function nextcat(){
	if($(".sectcat"+(cat+1)).length)
	{showcat(cat+1);}}

function showpag(init){
	$("#sectart"+page).css("display","none");
	$("#sectart"+init).css("display","block");
	$(".pageno"+page).css("background","none");
	$(".pageno"+page).removeClass("linkbutton");
	$(".pageno"+page).addClass("linkbutton");
	$(".pageno"+init).css("background-color","rgba(196,196,196,0.53)");
	page=init;}

function showprev(){
	if($("#sectart"+(page-1)).length)
	{showpag(page-1);}}

function shownext(){
	if($("#sectart"+(page+1)).length)
	{showpag(page+1);}}

function showcomm(init){
	$("#sectcomm"+comm).css("display","none");
	$("#sectcomm"+init).css("display","block");
	$(".commno"+comm).css("background","none");
	$(".commno"+comm).removeClass("linkbutton");
	$(".commno"+comm).addClass("linkbutton");
	$(".commno"+init).css("background-color","rgba(196,196,196,0.53)");
	comm=init;}

function showprevcomm(){
	if($("#sectcomm"+(comm-1)).length)
	{showcomm(comm-1);}}

function shownextcomm(){
	if($("#sectcomm"+(comm+1)).length)
	{showcomm(comm+1);}}

function artchange(aid){
$("#artchangbutt").html("<a class=\"btn btn_mod\" href=\"#\" onClick=\"artchangephp('"+aid+"');\" >Create/Change</a><br>");
$(".art_txt").each(function(index){
$( this ).prop('contenteditable',true);
	//$( this ).keyup(function(){console.log($( this ).html());});
});
$("#arttitle").prop('contenteditable',true);
}

function mainchange(tip){
$("#artchangbutt").html("<a class=\"btn btn_mod\" href=\"#\" onClick=\"mainchangephp('"+tip+"');\" >Create/Change</a><br>");
$(".art_txt").each(function(index){
//console.log($( this ).prop('contenteditable',true));
$("#maintitle").prop('contenteditable',true);
	//$( this ).keyup(function(){console.log($( this ).html());});
});
}

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
	//document.getElementById("txtHint").innerHTML = temp+" "+humid+" "+heat;
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "/site/script/test.py?temp=" + temp+"&humid="+humid+"&heat="+heat, true);
        xmlhttp.send();}

/*function mail(mess,subj){
	var url = "/site/script/mail.php";
	var formData = new FormData();
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };
	    formData.append("subj", subj);
	formData.append("mess",mess);
	xmlhttp.open("POST",url, true);
    xmlhttp.send(formData);
}*/

function newsletterins(name,mail){
	var url = "/site/script/newsletterins.php";
	var formData = new FormData();
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;
				$("#newsletterModal").modal("toggle");
            }
        };
	pattmail = /.+@.+\..+/;
	if(mail==undefined)
	mail=$("#mailnewsletter").val();
	if(name==undefined)
	name=$("#namenewsletter").val();
	if(!pattmail.test(mail))
	{$("#newsletterresp").html("Enter valid e-mail address");}
	else {
	formData.append("name",name);
	formData.append("mail",mail);
	xmlhttp.open("POST",url, true);
    xmlhttp.send(formData);
	xmlhttp.close();}
}

function newsletter() {
	q="<a class=\"linkbutton\" href=\"#\" data-toggle=\"modal\" data-target=\"#newsletterModal\"><i class=\"fa fa-newspaper-o\" aria-hidden=\"true\">Newsletter</i></a>";
	q+="<div class=\"modal fade\" id=\"newsletterModal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">";
    q+="<div class=\"modal-dialog\"><div class=\"modal-content\" style=\"padding:25px;\">";
    q+="<div class=\"container-fluid\" align=\"center\">";
    q+="<h3 align=\"center\">News Letter</h3><br/>";
    q+="<input type=\"text\" id=\"namenewsletter\" placeholder=\"Name\" class=\"form-control\">  <br />";
    q+="<input type=\"email\" id=\"mailnewsletter\" placeholder=\"E-mail\" class=\"form-control\"><br/>";
	q+="<p id=\"newsletterresp\" style=\"color:red\"></p>";
	q+="<a href=\"#\" class=\"btn btn_mod\" onClick=\"newsletterins();\">Join</a> ";
    q+="</div></div></div></div>";
	$("#newsletter").html(q);
        }

function showCom(aid) {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("comm").innerHTML = this.responseText;
				showcomm(0);
            }
        };
	if(aid!=undefined)
	{xmlhttp.open("GET", "/site/script/comment.php?aid="+String(aid), true);
        xmlhttp.send();}}

function showstar(aid){
    var url="/site/script/showstar.php?";
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("star").innerHTML = this.responseText;
            }
        };
	if(aid!=undefined)
	{var aid= String(aid);
    var formData = new FormData();
    formData.append("aid",aid);
    xmlhttp.open("POST",url, true);
    xmlhttp.send(formData);
	}
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

function score(tip,aid){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("topscore").innerHTML = this.responseText;
            }
        };
        q="";
        if(tip!=undefined)
        q="tip="+tip;
        if(aid!=undefined)
        {if(tip!=undefined)
        	q+="&";
        	q+="aid="+aid;
        }
        //console.log(q);
        xmlhttp.open("GET", "/site/script/score.php?"+q, true);
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
					  window.location.reload();
					  //window.location.replace("http://localhost/site/");
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
	var username =$("#usersignup").val();
	var password = $("#passwordsignup").val();
	var name = $("#namesignup").val(); 
	var mail = $("#mailsignup").val(); 
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
	if($("#newsmail").is(":checked"))
		{newsletterins(name,mail);}
	 xmlhttp.open("POST",url, true);
    xmlhttp.send(formData);
	xmlhttp.close();
	} 
	} 
	}
	}
	}
   }
}

function logout(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
								  window.location.reload();            }
        };
        xmlhttp.open("GET", "/site/script/logout.php?", true);
        xmlhttp.send();
	 log();
	 if(aid!=undefined)
	 {showCom(aid);
     showstar(aid);}}

function search(tip){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				console.log(this.responseText);
				document.getElementById("articlemain").innerHTML=this.responseText;
			}};
	searchitem=$("#search").val();
	console.log(searchitem);
	xmlhttp.open("GET", "/site/script/search.php?search="+searchitem+"&tip="+tip, true);
    xmlhttp.send();
}

function loadsearch(tip){
	 var q="<div class=\"navbar-form navbar-left\">";
	    q+="<div class=\"input-group\">"; 
		q+="<input type=\"search\" class=\"form-control\" placeholder=\"Search\" id=\"search\"  onKeyUp=\"search('"+tip+"')\">";
	    //q+="<input type=\"hidden\" name=\"tip\" value=\""+tip+"\">";
		q+="<div class=\"input-group-btn\">";
		q+="<button class=\"btn btn-default\" onClick=\"search('"+tip+"')\">Search</button>";
		q+="</div></div></div>";
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

function newcomm(tip,aid){
	var url = "/site/script/newcomm.php";
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("newcomm").innerHTML = this.responseText;
            }
        };
	var formData = new FormData();
	if(tip!=undefined&&tip.length!=0) 
	formData.append("tip",tip);
	if(aid!=undefined&&aid.length!=0)
	 formData.append("aid", aid);
		xmlhttp.open("POST", url, true);
        xmlhttp.send(formData);}

function adjpos(){
	$(window).scroll(function(){
        if($(window).scrollTop() > elPos.top){
              $('#newcomm').css('position','fixed').css('top','0');
        } else {
            $('#newcomm').css('position','static');
        }
});}

function addcom(user,aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				showCom(aid);
				newcomm('',aid);
			}
        };
	var url = "/site/script/addcomm.php";
	if(aid!=undefined)
	{var formData = new FormData();
	 formData.append("txt", document.getElementById("addcom").value);
	 formData.append("user", user);
	formData.append("aid", aid);
		xmlhttp.open("POST", url, true);
        xmlhttp.send(formData);}
	 log();
	 document.getElementById("addcom").value="";}

function remcom(cid,aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
			newcomm('',aid);
				showCom(aid);
				showcomm(comm);
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

function mainchangephp(tip){
var url = "/site/script/mainchangephp.php";
 txt="";
	i=0;
 $(".art_txt").each(function(index){
	txt+=$( this ).html()+"\n";
	 i++;
});
	console.log(txt);
 title=$("#maintitle").html();
	console.log(title);
 console.log("Number parag "+i);
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				window.location.reload();
			}};
	console.log(txt);
    var formData = new FormData();
    formData.append("txt@main",txt);
	formData.append("type@main",tip);
	formData.append("title@main",title);
    xmlhttp.open("POST",url, true);
    xmlhttp.send(formData);
}

function artchangephp(aid){
var url = "/site/script/artchange.php";
 txt="";
	i=0;
 $(".art_txt").each(function(index){
	txt+=$( this ).html()+"\n";
	 i++;
});
	title=$("#arttitle").html();
 console.log("Number parag "+i);
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				window.location.reload();
			}};
    var formData = new FormData();
    formData.append("txt@art",txt);
	formData.append("aid",aid);
	formData.append("title@art",title);
    xmlhttp.open("POST",url, true);
    xmlhttp.send(formData);
}

function artins(txt){
	var url = "/site/script/artinschange.php";
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            $("#artinsModal").modal("toggle");
             //mail(filetxt+$("#txtart").val(),$("#artbytype").val().length==0?$("#titleart").val():$("#artbytype").val());
			}
        };
	if($("#titleart").val().length>=3||$("#artbytype").val().length!=0)
	{var file = document.getElementById("fileart").files[0];
	 var file1 = document.getElementById("fileart1").files[0];
	 var file2 = document.getElementById("fileart2").files[0];
	 var file3 = document.getElementById("fileart3").files[0];
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
	}

}

function googleTranslateElementInit(lang) {
new google.translate.TranslateElement({pageLanguage: lang}, 'google_translate_element');
}
function transins(){
	var url = "/site/script/transchange.php";
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
			    link();}
        };
	if(document.getElementById("type@trans").value>=0)
	{var filetxt = document.getElementById("txtfiletrans").files[0];
    var formData = new FormData();
	 formData.append("txtfile@trans", filetxt);
	 formData.append("lang@trans", document.getElementById("lang@trans").value);
	formData.append("title@trans", document.getElementById("title@trans").value);
	formData.append("type@trans", document.getElementById("type@trans").value);
	formData.append("txt@trans", document.getElementById("txt@trans").value);
    xmlhttp.open("POST",url, true);
    xmlhttp.send(formData);}}

function mainins(){
	var url = "/site/script/mainchange.php";
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
			    link();}
        };
	if(document.getElementById("type@main").value.length>0)
	{var file = document.getElementById("file@main").files[0];
	 var filetxt = document.getElementById("txtfilemain").files[0];
    var formData = new FormData();
    formData.append("file@main", file);
	 formData.append("txtfile@main", filetxt);
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
                //document.getElementById("test").innerHTML = this.responseText;
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
                //document.getElementById("test").innerHTML = this.responseText;
			}
        };
        xmlhttp.open("GET", "/site/script/maindel.php?tip="+tip, true);
        xmlhttp.send();
        mainlistdel();
        link();}

function newarticlestart(){
	$("#newarticle").css({"bottom":$(".footer").height()+"px"});
	$("#newarticle").css({"z-index":"100"});
	$(".footer").height();
	
}

function closenewarticle(){
	$("#newarticle").html("");
	$("#newarticle").css({});
}

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
	newcomm(tip);
	log();
	link();
	showcat(0);
	showpag(0);
	newarticlestart();
	newsletter();
	loadsearch(tip);
    }

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

function start(tip,aid,user,aid){
	caid=aid;
	rate(tip);
	score(tip);
	showCom(aid);
	getscore(aid);
	newsletter();
	newcomm(tip);
	showpag(0);
	showcat(0);
	showcomm(0);
	log();
	link();
	newarticlestart();
	loadsearch(tip);
    showstar(aid);}
    
function rating(val,aid){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             log();
     showCom(aid);
     getscore(aid);
     showstar(aid);
     score(undefined,aid);
			}
        };
        xmlhttp.open("GET", "/site/script/rate.php?val="+val+"&aid="+aid, true);
        xmlhttp.send();} 

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
     showCom(aid);} 

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