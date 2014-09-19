# -*- coding: utf-8 -*-
"""
Created on Wed Sep 17 13:36:27 2014

@author: BDL_PC
"""
import MySQLdb

#def convertToType(params):
#    for i in (0,4,7,8,9):
#        params[i] = int(params[i])
#    params[6] = float(params[6])
#    return params

def makeEntry(params, tags):
    print params
    print tags
    for tableName in tags:
        try:
            q = "INSERT INTO "+tableName+" VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
            c.execute(q,params)
            db.commit()
            print params[2],'written to', tableName
        except(MySQLdb.ProgrammingError):
            try:
                q = "INSERT INTO otherbooks VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
                c.execute(q,params)
                db.commit()
                print params[2],'written to otherbooks with genre'
            except(MySQLdb.IntegrityError):
                pass
        except(MySQLdb.IntegrityError):
            print 'Book',params[2], 'with ISBN-13',params[0],'skipped'

lineNum = 1
params = []
tags = []
categories = ['Art','Biography','Business','Children-s','Classics','Comics','Contemporary','Crime','Fantasy','Fiction','Historical Fiction','History','Horror','Humor And Comedy','Memoir','Music','Mystery','Non Fiction','Paranormal','Philosophy','Poetry','Psychology','Religion','Romance','Science','Science Fiction','Self Help','Suspense','Spirituality','Sports','Thriller','Travel','Young Adult']
uname = "root"
password = "toor"
servername = "localhost"
dbname = "readersjunction"
db=MySQLdb.connect(host=servername,user=uname,passwd=password,db=dbname)
c=db.cursor()

for cat in categories:
    print '\n'
    print 'Now Entering data for', cat,' Books'
    print '\n'
    cat = cat.replace(' ','')
    with open(cat+'data.txt','r') as fdata:
        for line in fdata:
            
            line = line.strip()
            if(line=='++++'):
                lineNum=2
                tags = []
            elif(line=='========'):
                lineNum=1
                #params = convertToType(params)
                makeEntry(params, tags)
                print '\n'
                params = []
                tags = []
            else:
                if(lineNum==1):
                    params.append(line)
                elif(lineNum==2):
                    line = line.replace(' ','')
                    line = line.lower()
                    line+='books'
                    tags.append(line)
    
    print '\n'
    print 'Data written for', cat,' Books'
    