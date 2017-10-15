#!/Python27/python
import cgi, cgitb
import re,os
import MySQLdb
db = MySQLdb.connect("localhost","root","","site")
def addlink(tip,fname):
       cursor = db.cursor()
       sql="SELECT * FROM article WHERE FNAME='"+fname[:len(fname)-5]+"' AND TYPE='"+tip+"'"
       print sql
       try:
               cursor.execute(sql)
               results = cursor.fetchall()
               print results
               count=0
               if len(results)==0:
                       sql="INSERT INTO article (FNAME,TYPE,TITLE) VALUES (%s,%s,%s)" % (fname[:len(fname)-5],tip," ")
                       try:
                               print sql
                               cursor.execute(sql)
                               db.commit()                               
                       except:
                               print "NO DBASE <br>"
       except:
               print "No DataBase"

print "Content-type:text/html\r\n\r\n"
print "<html>"
print "<head>"
print "<title>Hello - Second CGI Program</title>"
print "</head>"
print "<body>"
form = cgi.FieldStorage() 
ext= ".html"

print ext
print os.listdir(os.getcwd()),"<br>"
print os.getcwd(),"<br>"
c=["spo","gen","bus","div",""]
patt=".*\\"+ext
for i in c:
        print os.listdir(os.getcwd()+"/"+i)
        print i
        for t in os.listdir(os.getcwd()+"/"+i):
                q=re.findall(patt,t,re.I)
                if len(q)!=0:
                        addlink(i,t)
#print "hey"
#for fisier in os.listdir(os.getcwd()):
#        patt=".*\\"+ext
#        q=re.findall(patt,fisier,re.I)
#        print q,len(q),fisier,"<br>"
#        if len(q)!=0:
#                print "<a href=\"/site/"+fisier+"\">"+"Adresa"+"</a><br>"
#print "</body>"
#print "</html>"
