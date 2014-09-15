# -*- coding: utf-8 -*-
"""
Created on Mon Sep 15 22:43:26 2014

@author: Harsh Sharma

This script is for printing data to text file because
entries in MySQL have to be made only on one PC.

"""

from bs4 import BeautifulSoup
import requests
from google import search
import re


#Read book names from a file
bookNames = [];
i=0
f2 = open('data.txt', 'w')

# Read book names from file Books.txt - NOTE THE CAPITAL B
with open('C:\Users\Harsh Sharma\Desktop\Books.txt','r') as fid:
    for line in fid:
        bookNames.append(line);
        bookNames[i] = bookNames[i].strip()
        bookNames[i] = bookNames[i][5:].upper() #5 because of the way data in txt file
        i+=1

flip='flipkart'
good = 'goodreads'

#MAIN loop begins - insert all books available in array
for i in range(0,len(bookNames)):
    url = ''
    url2 = ''
    name = ''
    author = ''
    pages = 0
    price = 0
    rating = 0
    genreArray = []
    
    # Search Web for flipkart link - for price, pages author, etc.
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

        try: #If MRP != SP
            price = str(soup.find('span', class_='price list old-price').text)
        except(AttributeError): # If MRP = SP
            price = str(soup.find('span', class_='fk-font-26 pprice fk-bold vmiddle').text)

        price = int(price[price.index('.')+2:])
        ar1 = soup.findAll('td', class_='specs-value fk-data')
        try:
            author = str(ar1[0].text) 
            publisher = str(ar1[1].text)
            year = int(ar1[2].text)
            isbn13 = int(ar1[3].text)
            isbn10 = int(ar1[4].text)
            language = str(ar1[5].text)
            pages = str(ar1[7].text)
            pages = int(pages[0:pages.index(' ')])
        except(AttributeError):
            pass
        except(ValueError):
            author = str(ar1[0].text) 
            publisher = str(ar1[1].text)
            year = int(ar1[2].text)
            isbn13 = int(ar1[3].text)
            isbn10 = int(ar1[4].text)
            language = str(ar1[5].text)
            
        if bookNames[i] in gTitle: #Verify Page Title
            rating = float(soup2.find('span', class_='average').text)
            
            genreArrayLinks = soup2.findAll('a', href=re.compile('/genre/*'))
            for g in range(1, len(genreArrayLinks)):
                genreArrayLink = str(genreArrayLinks[g])
                genreArray.append(genreArrayLink[genreArrayLink.index('>')+1:genreArrayLink.rindex('<')])
            
    if(genreArray == [] and name!=''):
        genreArray.append('Others')
   
   # Calculate rent based on slabs
    if(0<price<=50):
        rent = 10
    elif(50<price<=150):
        rent=20
    elif(150<=price<=300):
        rent=40
    elif(price>300):
        rent=50
    for tname in genreArray:
        while genreArray.count(tname)!=1:
            genreArray.remove(tname)
    
    if(author!=''): #Write valid entries only
        params = [isbn13, isbn10, name, author, pages, language, rating, price, rent, year, publisher, ]
        for d1 in params:
            f2.write(str(d1))
            f2.write('\n')
        f2.write('++++') #To seperate genres from params
        
        for d2 in genreArray:
            f2.write(d2)
            f2.write('\n')
            
        f2.write('========')
    
f2.close()
fid.close()