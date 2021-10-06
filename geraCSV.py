import csv
import random
qtd_registro=input("Digite o numero de resgistro que deseja gerar")
f = open('registrosPonto.csv', 'w', newline='', encoding='utf-8')
w = csv.writer(f)

for i in range(1,int(qtd_registro)):
    pontos=random.sample({1,2,3,4},random.randint(1,4))
    w.writerow(['12593199854',pontos])