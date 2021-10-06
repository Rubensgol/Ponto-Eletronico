from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import csv
import time
registro=[]
with open('registrosPonto.csv', newline='') as f:
    reader = csv.reader(f)
    registro= list(reader)
browser = webdriver.Chrome()

for ponto in registro:
    browser.get("http://localhost/dw1/Ponto%20Eletronico/UI/baterPonto.php")
    input_text = browser.find_element_by_name('cpf')
    cpf =ponto[0]
    input_text.send_keys(cpf)
    pontos=ponto[1].replace("[","")
    pontos=pontos.replace("]","")
    pontos=pontos.split(",")
    pontos=list(map(int,pontos))
    for p in pontos:
        browser.find_element_by_name(p).click()
    time.sleep(5)
    browser.find_element_by_name(" btnPonto").click()