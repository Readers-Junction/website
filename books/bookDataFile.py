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
#categories = ['Art','Biography','Business','Children-s','Classics','Comics','Contemporary','Crime','Fantasy','Fiction','Historical Fiction','History','Horror','Humor And Comedy','Memoir','Music','Mystery','Non Fiction','Paranormal','Philosophy','Poetry','Psychology','Religion','Romance','Science','Science Fiction','Self Help','Suspense','Spirituality','Sports','Thriller','Travel','Young Adult']
categories = ['Crime','Fantasy','Fiction','Historical Fiction','History','Horror','Humor And Comedy','Memoir','Music','Mystery','Non Fiction','Paranormal','Philosophy','Poetry','Psychology','Religion','Romance','Science','Science Fiction','Self Help','Suspense','Spirituality','Sports','Thriller','Travel','Young Adult']
# Read book names from file Books.txt - NOTE THE CAPITAL B
for cat in categories:
        i=0
        bookNames = []
        f2 = open(cat+'data.txt', 'w')
        with open(cat+'books.txt','r') as fid:
            for line in fid:
                bookNames.append(line);
                bookNames[i] = bookNames[i].strip()
                bookNames[i] = bookNames[i][:bookNames[i].index(' by ')].upper() #Because of the way data in txt file
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
                print bookNames[i]
            
        
            name=bookNames[i]
            try: #If MRP != SP
                price = str(soup.find('span', class_='price list old-price').text)
                price = price.replace(',','')
                price = int(price[price.index('.')+2:])
            except(AttributeError): # If MRP = SP
                try:
                    price = str(soup.find('span', class_='fk-font-26 pprice fk-bold vmiddle').text)
                    price = price.replace(',','')
                    price = int(price[price.index('.')+2:])
                except:
                    pass
            try:
                
                valueAr = soup.findAll('td', class_='specs-value fk-data')
                keyAr2 = soup.findAll('td', class_='specs-key')
                keyAr = []
                for key in keyAr2:
                    keyAr.append(str(key.text))
                for z in range(0, len(keyAr)):
                    if(keyAr[z] == 'Authored By' or keyAr[z] == 'Author'):
                        author = str(valueAr[z].text)
                    elif(keyAr[z] == 'Publisher'):
                        publisher = str(valueAr[z].text)
                    elif(keyAr[z] == 'Publication Year'):
                        year = str(valueAr[z].text)
                        year = int(year[0:3])
                    elif(keyAr[z] == 'ISBN-13'):
                        isbn13 = int(valueAr[z].text)
                    elif(keyAr[z] == 'ISBN-10'):
                        isbn10 = str(valueAr[z].text)
                    elif(keyAr[z] == 'Language'):
                        language = str(valueAr[z].text)
                    elif(keyAr[z] == 'Number of Pages'):
                        pages = str(valueAr[z].text)
                        pages = int(pages[0:pages.index(' ')])
                    
            
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
            except:
                pass
            params = [isbn13, isbn10, name, author, pages, language, rating, price, rent, year, publisher]
            print params
            if(author!=''): #Write valid entries only
                for d1 in params:
                    f2.write(str(d1))
                    f2.write('\n')
                f2.write('++++\n') #To seperate genres from params
                
                for d2 in genreArray:
                    f2.write(d2)
                    f2.write('\n')
                    
                f2.write('========\n')
                print bookNames[i], 'written'
            
        
        print'\n'
        print cat, ' - WRITTEN'
        print'\n'
        print'\n'
        f2.close()
        fid.close()
