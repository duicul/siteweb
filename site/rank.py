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
db = MySQLdb.connect("localhost","root","","site")
cursor = db.cursor()
sql="SELECT * FROM article ORDER BY RATE DESC "
print sql
try:
   # Execute the SQL command
   cursor.execute(sql)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   print results
   count=0
   for row in results:
      if len(row)!=0:
         aux=row[0]
         q="<br><a href=\"/site/"+row[2]+"/"+aux+".html\">"+row[1]+"</a><br>"
         print q
         count=count+1
         print "<h1>YESb<br></h1>"
         if count>=10:
            break
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
