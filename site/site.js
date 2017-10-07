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