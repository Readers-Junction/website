# -*- coding: utf-8 -*-
"""
Created on Mon Sep 15 14:21:58 2014

@author: Harsh Sharma

http://mysql-python.sourceforge.net/MySQLdb.html
"""

from bs4 import BeautifulSoup
import requests
from google import search
import re
import MySQLdb


#Read book names from a file
bookNames = [];
i=0
f2 = open('data.txt', 'w')
with open('C:\Users\Harsh Sharma\Desktop\Books.txt','r') as fid:
    for line in fid:
        bookNames.append(line);
        bookNames[i] = bookNames[i].replace('\n','')
        bookNames[i] = bookNames[i][5:].upper()
        i+=1


flip='flipkart'
am = 'amazon.in'
good = 'goodreads'
bookid = 25

#Connect to MySQL Datatbase
uname = "root"
password = "toor"
servername = "localhost"
dbname = "readersjunction"
db=MySQLdb.connect(host=servername,user=uname,passwd=password,db=dbname)
c=db.cursor()


#MAIN loop begins - insert all books available in array
for i in range(0,len(bookNames)):
    bookid+=1
    url = ''
    url2 = ''
    name = ''
    author = ''
    pages = 0
    price = 0
    rating = 0
    genreArray = []
    
    # Search Web for flipkart link - for price, pages and author
    for url in search(bookNames[i]+' buy book flipkart', tld='in', lang='en-us', stop=5):
        if (flip in url):
            url = str(url)
            break
    # Search for goodreads link - For rating and tags
    for url2 in search(bookNames[i]+' goodreads', tld='in', lang='en-us', stop=5):
        if (good in url2):
            url2 = str(url2)
            break
    
    try:
        r  = requests.get(url);
        soup = BeautifulSoup(r.text)
        pagelink = url[24:url.index('-')]
        pagelink = pagelink.upper()
        pageTitle = str(soup.title).upper()
    except(requests.exceptions.MissingSchema):
        pageTitle = 'Placeholder Value'
        print bookNames[i]
    
    try:
        r2 = requests.get(url2)
        soup2 = BeautifulSoup(r2.text)
        gTitle = str(soup2.title).upper()
    except(requests.exceptions.MissingSchema):
        gTitle = 'Placeholder Value'
        bookNames[i]
    
    if bookNames[i] in pageTitle or pagelink in bookNames[i]:
        name=bookNames[i]

        try:
            author = str(soup.find('span', class_='author fk-font-medium').text).strip()
        except(AttributeError):
            if bookNames[i] in gTitle:
                author = str(soup2.find('a', class_='authorName').text)
            
        try:        
            pages = str(soup.find('span', class_='fk-bold file-size').text)
            pages = int(pages[pages.index(':')+2:pages.rindex(' ')])
        except(AttributeError):
            if bookNames[i] in gTitle:
                pages = str(soup2.find('div', class_='row').text)
                try:
                    pages = pages[0:pages.rindex(' ')]
                except(ValueError):
                    pages = pages[pages.index(' ')+1:pages.rindex(' ')]
                    
        try:
            price = str(soup.find('span', class_='price list old-price').text)
        except(AttributeError):
            price = str(soup.find('span', class_='fk-font-26 pprice fk-bold vmiddle').text)

        price = int(price[price.index('.')+2:])
        if bookNames[i] in gTitle:
            rating = float(soup2.find('span', class_='average').text)
            
            genreArrayLinks = soup2.findAll('a', href=re.compile('/genre/*'))
            for g in range(1, len(genreArrayLinks)):
                genreArrayLink = str(genreArrayLinks[g])
                genreArray.append(genreArrayLink[genreArrayLink.index('>')+1:genreArrayLink.rindex('<')])
            
    print 'Book Name = ', bookNames[i]
    print 'Book ID = ', bookid
    print 'Name = ',name
    if (name == ''):
        bookid-=1
    print 'Author = ', author
    print 'Pages = ', pages
    print 'Price = ', price
    print 'Rating = ', rating

    if(genreArray == [] and name!=''):
        genreArray.append('Others')
    print 'Tags = ', genreArray
    
    if(0<price<=50):
        rent = 10
    elif(50<price<=150):
        rent=20
    elif(150<=price<=300):
        rent=40
    elif(price>300):
        rent=50
    
    for tname in genreArray:
        try:
            if genreArray.count(tname)>1:
                genreArray.remove(tname)
                
            params = [bookid, name, author, pages, rating, price, rent]
            if tname.lower()=='biography':
                c.execute("INSERT INTO biogbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            
            elif tname.lower()=='children\'s':
            	c.execute("INSERT INTO childrenbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='classic':
            	c.execute("INSERT INTO classicbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='comic':
            	c.execute("INSERT INTO comicbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='crime':
            	c.execute("INSERT INTO crimebooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='fiction':
            	c.execute("INSERT INTO fictionbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 	
            
            elif tname.lower()=='horror':
            	c.execute("INSERT INTO horrorbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='humor and comedy':
            	c.execute("INSERT INTO humorbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='non fiction':
            	c.execute("INSERT INTO nonfictionbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='philosophy':
            	c.execute("INSERT INTO philosophybooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='religion':
            	c.execute("INSERT INTO religionbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='romance':
            	c.execute("INSERT INTO romancebooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='sciencefiction':
            	c.execute("INSERT INTO sciencefictionbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='selfhelp':
            	c.execute("INSERT INTO selfhelpbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='suspense':
            	c.execute("INSERT INTO suspensebooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='spirituality':
            	c.execute("INSERT INTO spiritualitybooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='thriller':
            	c.execute("INSERT INTO thrillerbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            	
            elif tname.lower()=='travel':
            	c.execute("INSERT INTO travelbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            
            elif tname.lower()=='others':
                c.execute("INSERT INTO otherbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            
            elif tname.lower()=='short stories':
                c.execute("INSERT INTO shortbooks VALUES (%s, %s, %s, %s, %s, %s, %s)", params) 
            
            db.commit();
        except(_mysql_exceptions.IntegrityError):
            pass
        
    print 'Tags = ', genreArray
    print '\n'