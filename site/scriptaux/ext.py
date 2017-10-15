#!/Python27/python
import cgi, cgitb
import re,os
import MySQLdb

print "Content-type:text/html\r\n\r\n"
print "<html>"
print "<head>"
print "<title>Hello - Second CGI Program</title>"
print "</head>"
print "<link rel=\"stylesheet\" href=\"bootstrap.css\">"
print "<script src=\"bootstrap.js\"></script>"
print "<body>"
form = cgi.FieldStorage() 
ext= form.getvalue('ext')
print ext,os.listdir(os.getcwd()),"<br>",os.getcwd(),"<br>"
for fisier in os.listdir(os.getcwd()):
        patt=".*\\"+ext
	q=re.findall(patt,fisier,re.I)
	print q,len(q),fisier,"<br>"
	if len(q)!=0:
           print "<a href=\"/site/"+fisier+"\">"+"Adresa"+"</a><br>"
words=search.split()
print words
print "<br>"
print "<h1>",search,"</h1><br>"

print "<h1>",search,"</h1><br>"       
print "<h1>YESa<br></h1>"     
print "<h1>YES<br></h1>"
x={5:"a",6:"b",7:"c",1:"d",2:"e",3:"f"}
print x,"<br>"
for i in sorted(x):
  print i,x[i]
print "</body>"
print "</html>"
