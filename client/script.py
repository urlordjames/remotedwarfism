import requests
from mss import mss
import time
import win32com.client

passwd = str(input("password:\n"))

def upload(wait):
    assert type(wait) == float or int, "wait time must be int or float"
    time.sleep(wait)
    screen = mss()
    screen.compression_level = 5
    screen.shot(output="screenshot.png")
    r = requests.post("https://expected.ga/badia/upload.php", files={"fileToUpload": open("screenshot.png","rb")}, data={"submit":"bruh", "passwd": passwd})
    print(r.text)

def get(wait):
    assert type(wait) == float or int, "wait time must be int or float"
    time.sleep(wait)
    r = requests.get("https://expected.ga/badia/do.txt")
    key = r.text
    print(key)
    return key

def trysend(wait):
    assert type(wait) == float or int, "wait time must be int or float"
    time.sleep(wait)
    r = requests.get("https://expected.ga/badia/send.txt")
    status = r.text
    if status == "yeah":
        upload(0.1)
        return True
    else:
        return False
    

def typekey(key):
    assert type(key) == str, "key must be string"
    if not key == "":
        shell = win32com.client.Dispatch("WScript.Shell")
        shell.SendKeys(key)
        time.sleep(1)

while True:
    trysend(0.1)
    typekey(get(0.1))
