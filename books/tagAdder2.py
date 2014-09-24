# -*- coding: utf-8 -*-
"""
Created on Fri Sep 19 13:18:56 2014

@author: BDL_PC
"""

s=[]
a = []
x = []
z=[]

with open('data.txt', 'r') as f2:
    for line in f2:
        line = line.split('\t')
        a.append(line)
        

tags =[]
m=len(a)
k=1
isbn=0
a.sort()
for i in range(0,m):
    isbno = isbn
    if(i!=0):
        isbn = a[i][1]
    else:
        isbn = a[i][0]
    
    if(isbno!=isbn):
        for k in range (0,m):
            if (a[k][1] == isbn):
                z.append(a[k][len(a[k])-1].strip())
    z.append(',')


            
f3 = open('s.txt','w')
for g in z:
        f3.write(g)        
        f3.write('\t')
        if(g==','):
            f3.write('\n')
f3.close()
f2.close


