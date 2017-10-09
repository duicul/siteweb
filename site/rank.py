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
         if count>=10:
            break
except:
   print "No DataBase"             
db.close()
print "</body>"
print "</html>"
