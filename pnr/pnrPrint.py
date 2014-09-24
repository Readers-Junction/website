# -*- coding: utf-8 -*-
"""
Created on Wed Sep 24 19:00:24 2014

@author: Harsh Sharma
"""

import pnrapi

pnrnum = 8626564409

p = pnrapi.PnrApi(str(pnrnum))	
if p.request() == True:
	response = p.get_json()
else:
	print "Service unavailable"


for k in response:
    print k,'\t\t', response[k]