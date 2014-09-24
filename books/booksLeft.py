# -*- coding: utf-8 -*-
"""
Created on Tue Sep 16 23:35:59 2014

@author: Harsh Sharma

To filter out the books whose data has not been written
"""

categories = ['Art','Biography','Business','Children-s','Classics','Comics','Contemporary','Crime','Fantasy','Fiction','Historical Fiction','History','Horror','Humor And Comedy','Memoir','Music','Mystery','Non Fiction','Paranormal','Philosophy','Poetry','Psychology','Religion','Romance','Science','Science Fiction','Self Help','Suspense','Spirituality','Sports','Thriller','Travel','Young Adult']

for cat in categories:
        i=0
        x=0
        bookNames = []
        names=[]
        cat = cat.replace(' ','')
        f2 = open(cat+'data.txt', 'r')
        f3 = open(cat+'Remaining.txt', 'w') 
        fid = open(cat+'books.txt','r')
        for line in fid:
            bookNames.append(line);
            bookNames[i] = bookNames[i].strip().upper()
            bookNames[i] = bookNames[i][:bookNames[i].index(' BY ')].upper() #Because of the way data in txt file
            i+=1
        for n in f2:
            x+=1
            if x==3:
                names.append(n.strip())
            if n=='========\n':
                x=0
        
        if(len(names)==len(bookNames)):
            f3.close()
            f2.close()
            fid.close()
        else:
            for z in bookNames:
                if(not z in names):
                    f3.write(z)
                    f3.write('\n')
            f3.close()
            f2.close()
            fid.close()
