#!/Python27/python
import cgi, cgitb
import MySQLdb
form = cgi.FieldStorage() 
name = form.getvalue('name')
user  = form.getvalue('user')
password  = form['password'].value
mail  = form.getvalue('mail')
db = MySQLdb.connect("localhost","root","","site")
cursor = db.cursor()
sql="INSERT INTO user (NAME,USERNAME,PASSWORD,MAIL,ADMIN) VALUES (%s,%s,%s,%s,0)" % (name,user,password,mail)
print "Content-type:text/html\r\n\r\n"
print "<html><body>",sql
try:
 cursor.execute(sql)
 db.commit()
except:
 print "NO DBASE <br>"
db.close()
print "</body></html>"
