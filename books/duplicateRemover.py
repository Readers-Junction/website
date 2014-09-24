# -*- coding: utf-8 -*-
"""
Created on Fri Sep 19 13:18:56 2014

@author: BDL_PC
"""

s=[]
a = []
x = []
z=[]
with open('data.txt', 'r') as f:
    for line in f:
        s = line.split('\t')
        x.append(s[0:len(s)-1])
print len(x)
print '\n'
with open('d2.txt', 'r') as f2:
    for line in f2:
        line = line.strip()
        a.append(line)
        
print len(a)
f3 = open('d3.txt','w')
for t in x:
    for g in a:
        if(g in t):
            if not t in z:
                z.append(t)
    
for t in z:
    for g in t:
        f3.write(g)
        f3.write('\t')
    f3.write('\n')


print len(z)
print '\n'
print len(a)

f3.close()
f2.close
f.close()

