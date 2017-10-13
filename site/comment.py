#!/Python27/python
import cgi, cgitb
import re,os
import MySQLdb

print "Content-type:text/html\r\n\r\n"
#print "<link rel=\"stylesheet\" href=\"bootstrap.css\">"
#print "<script src=\"bootstrap.js\"></script>"
print "<body>"

form = cgi.FieldStorage() 
aid =str(form.getvalue('aid'))
user =str(form.getvalue('user'))
print aid
db = MySQLdb.connect("localhost","root","","site")
cursor = db.cursor()
sql = "SELECT * FROM comment WHERE AID="+aid+" ORDER BY DATE DESC "
#print sql
try:
   # Execute the SQL command
   cursor.execute(sql)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   #print results
   print "<div class=\"container-fluid\">"
   print user,"<br>"
   for row in results:
      #print row
      print "<div class=\"row row_com\">"
      print "<div class=\"col-2 \">"
      print "<p class=\"user_com\">"
      print row[1],"<br>",row[4],"</p></div>"
      print "<div class=\"col-4\">"
      print "<p class=\"txt_com\">"
      print row[3],"<br>"
      print "<i class=\"fa fa-thumbs-o-up\">up</i> <i class=\"fa fa-thumbs-down\">down</i>"
      print "<i class=\"fa fa-times align=\"right\"\">remove</i>" if user==row[1] and user!="anonymous" else ""
      print "</p></div>"
      print "</div>"
   print "</div>" 
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
print "</body>"
print "</html>"

