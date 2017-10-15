#!/Python27/python
import cgi, cgitb
import MySQLdb
def isfloat(value):
  try:
    float(value)
    return True
  except:
    return False
def isint(value):
  try:
    int(value)
    return True
  except:
    return False
form = cgi.FieldStorage() 
temp = form.getvalue('temp')
humid  = form.getvalue('humid')
heat  = form.getvalue('heat')
print "Content-type:text/html\r\n\r\n"
print "<html>"
print "<head>"
print "<title>Hello - Second CGI Program</title>"
print "</head>"
print "<link rel=\"stylesheet\" href=\"bootstrap.css\"><script src=\"bootstrap.js\"></script>"
print "<body>"
print "<h2>Temperature"
print temp
print "C</h2>" 
print "<h2>Humidity"
print humid
print "%</h2>" 
print "<h2>Heat Index"
print heat
print "%</h2>"
db = MySQLdb.connect("localhost","root","","test")
cursor = db.cursor()
if(isint(temp) and isfloat(humid) and isfloat(heat)):
 temp=int(temp)
 humid=float(humid)
 heat=float(heat)
sql="""INSERT INTO readings (temp,humid,heat) VALUES (%d,%f,%f)""" % (temp,humid,heat)
print sql
try:
 cursor.execute(sql)
 db.commit()
except:
 print "Not commited"
sql = "SELECT * FROM readings"

try:
   # Execute the SQL command
   cursor.execute(sql)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   print "<ul class=\"list-group\">"
   for row in results:
      temp = row[0]
      humid = row[1]
      heat = row[2]
      time = row[3]
      # Now print fetched result 
      print "<li class=\"list-group-item\"><h2>Temperature=",temp
      print "Humidity=",humid
      print "Heat Index=",heat
      print "Time=",time
      print "</h2></li>"
   print "</ul>"   
except:
   print "Error: unable to fecth data"
db.close()
x={5:"a",6:"b",7:"c",1:"d",2:"e",3:"f"}
print x,"<br>"
for i in sorted(x):
  print i,x[i]
print "</body>"
print "</html>"
