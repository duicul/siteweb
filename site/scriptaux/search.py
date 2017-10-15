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
search = form.getvalue('search')
words=search.split()
print words
print "<br>"
print "<h1>",search,"</h1><br>"

print "<h1>",search,"</h1><br>"

db = MySQLdb.connect("localhost","root","","site")
cursor = db.cursor()

sql = "SELECT * FROM article"
print sql
try:
   # Execute the SQL command
   cursor.execute(sql)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   x={}
   for row in results:
     val=0
     for i in words:
       pattern="\\w*"+i+"\\w*"
       print pattern
       find=re.findall(pattern,row[1],re.I)
     print find,row,row[1],"<br>"
     val=val+len(find)
     if val>0 :
        x.update({val:row[0]}) 
except:
   print "No DataBase"

lista=sorted(x,None,None,True)
print lista,x[lista[0]]

for i in range(10) if len(lista)>10 else range(len(lista)):
              print lista[i],x[lista[i]]

for i in range(10) if len(lista)>10 else range(len(lista)):
              sql="SELECT * FROM article WHERE ID=\""+x[lista[i]]+"\""
              print sql
              try:
                # Execute the SQL command
                cursor.execute(sql)
                # Fetch all the rows in a list of lists.
                results = cursor.fetchall()
                print results
                for row in results:
                  print row[1],row[0][0:3],row[0][3:]
                  aux=row[0]
                  print aux
                  q="<a href=\"/site/"+row[2]+"/"+aux+".html\">"+row[1]+"</a><br>"
                  print q
                  print "<h1>YESb<br></h1>" 
              except:
                 print "No DataBase"
              
print "<h1>YESa<br></h1>"     
db.close()
print "<h1>YES<br></h1>"
x={5:"a",6:"b",7:"c",1:"d",2:"e",3:"f"}
print x,"<br>"
for i in sorted(x):
  print i,x[i]
print "</body>"
print "</html>"
