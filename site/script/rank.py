#!/Python27/python
import cgi, cgitb
import re,os
import MySQLdb

print "Content-type:text/html\r\n\r\n"
form = cgi.FieldStorage() 
tip =form.getvalue('tip')

db = MySQLdb.connect("localhost","root","","site")
cursor = db.cursor()
if tip=="1":
   cond=""
else:
   cond="WHERE TYPE="+tip
#print cond
sql="SELECT * FROM article "+cond+" ORDER BY RATE DESC "
try:
   # Execute the SQL command
   cursor.execute(sql)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   #print results
   count=0
   for row in results:
         print "<p>"
         q=""
         q="<br><a class=\"alink\" href=\"/site/page.php?id="+row[0]+"&type="+str(row[4])+"\">"+row[1]+"<br>"
         print q
         if len(row[3])>0:
            print "<img align=\"left\" src=\"/site/img/"+row[3]+"\" width=\"100\" height=\"80\"\"></img>"
         print "</a>"
         print row[2][0:100]+"...."
         print "</p>"
         print "Views: "+str(row[5])+"<br>"
         count=count+1
         if count>=10:
            break
except:
   print "No DataBase"             
db.close()
print "<br>"
