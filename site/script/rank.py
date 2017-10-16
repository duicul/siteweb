#!/Python27/python
import cgi, cgitb
import re,os
import MySQLdb

print "Content-type:text/html\r\n\r\n"
form = cgi.FieldStorage() 
tip =form.getvalue('tip')

db = MySQLdb.connect("localhost","root","","site")
cursor = db.cursor()

if tip=="none":
   cond=""
else:
   cond="WHERE TYPE='"+tip+"'"
sql="SELECT * FROM article "+cond+"ORDER BY RATE DESC "
try:
   # Execute the SQL command
   cursor.execute(sql)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   #print results
   count=0
   for row in results:
      if len(row)!=0:
         aux=row[1]
         print "<p>"
         q="<br><a class=\"alink\" href=\"/site/page.php?id="+str(row[0])+"&type="+row[5]+"\">"+row[2]+"<br>"
         print q
         if len(row[4])>0:
            print "<img align=\"left\" src=\"/site/img/"+row[4]+"\" width=\"100\" height=\"80\"\"></img>"
         print "</a>"
         print row[3][:40]+"...."
         print "</p>"
         print "Views: "+str(row[6])+"<br>"
         count=count+1
         if count>=10:
            break
except:
   print "No DataBase"             
db.close()
print "<br>"
