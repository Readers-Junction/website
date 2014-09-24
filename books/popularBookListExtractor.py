# -*- coding: utf-8 -*-
"""
Created on Tue Sep 16 05:56:04 2014

@author: Harsh Sharma
"""

from bs4 import BeautifulSoup
import requests


#Read book names from a file
baseURL = 'http://www.goodreads.com/shelf/show/';

categories = ['Art','Biography','Business','Children-s','Classics','Comics','Contemporary','Crime','Fantasy','Fiction','Historical Fiction','History','Horror','Humor And Comedy','Memoir','Music','Mystery','Non Fiction','Paranormal','Philosophy','Poetry','Psychology','Religion','Romance','Science','Science Fiction','Self Help','Suspense','Spirituality','Sports','Thriller','Travel','Young Adult']
for cat in categories:
    fid = open(cat.replace(' ', '')+'books.txt', 'w')
    url = baseURL+cat
    bookNames = []
    authorNames = []
    r  = requests.get(url);
    soup = BeautifulSoup(r.text)
    ar1 = soup.findAll('a', class_='bookTitle')
    ar2 = soup.findAll('a', class_='authorName')
    
    try:
        for key in ar1:
            t = str(key.text)
            bookNames.append(t[0:t.index('(')-1])
    except:
        pass
    try:    
        for key in ar2:
                authorNames.append(str(key.text))
    except:
        pass
    
    for i in range(0, len(bookNames)):
        fid.write(bookNames[i]+' by '+ authorNames[i])
        fid.write('\n')

    fid.close()
    print cat, ' written'
        