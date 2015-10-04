#!/bin python2
#-*- coding:utf-8-*-

import urllib2
import urllib
import cookielib
# import time


class Visit:
    def __init__(self):
        self.cookies = cookielib.CookieJar()
    def admin(self):
        url = 'http://pentest.atomsquare.com/xssGuestBook/admin/_login.php'
        postData = urllib.urlencode(
        {
            'uname':'ddmin',
            'password':'Xsser@lc4t'
        })
        opener = urllib2.build_opener(urllib2.HTTPCookieProcessor(self.cookies))
        request = urllib2.Request(url = url, data = postData)
        result = opener.open(request)
        # print (result.read())

    def delete(self):
        self.admin()
        urldelete = "http://pentest.atomsquare.com/xssGuestBook/admin/__CnSs__ReCovEry.php"
        opener = urllib2.build_opener(urllib2.HTTPCookieProcessor(self.cookies))
        request = urllib2.Request(url = urldelete)
        result = opener.open(request)
        # print (result.read())


import webbrowser
import time
import os

while (True):
    webbrowser.open("http://192.168.1.91/visit.php")
    time.sleep(300)
    delete = Visit()
    delete.delete()
    os.system('taskkill -im chrome.exe')
