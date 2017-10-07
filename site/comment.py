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
aid = form.getvalue('aid')
print aid
db = MySQLdb.connect("localhost","root","","site")
cursor = db.cursor()

sql = "SELECT * FROM comment WHERE aid=\""+aid+"\""
print sql
try:
   # Execute the SQL command
   cursor.execute(sql)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   val=0
   for row in results:
      print "<div class=\"row\">"
      if val%2==0:
         print "<div class=\"col-2\">"
         print getname(row[0]),"</div>"
         print "<div class=\"col-4\">"
         print row[3],"</div>"
      else:
         print "<div class=\"col-4\">"
         print row[3],"</div>"
         print "<div class=\"col-2\">"
         print getname(row[0]),"</div>"
      val=val+1
         
except:
   print "No DataBase"

def getname(uid):
   sql1 = "SELECT * FROM user WHERE aid=\"+aid\""
   print sql1
   try:
      cursor.execute(sql)
      results = cursor.fetchall()
      return results[0][1] 
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

