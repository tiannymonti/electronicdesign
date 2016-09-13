import mysql.connector
import mysql

hora = '10'
minu= '30'
seg = '11'
dia1 = '13'
mes = '9'
year = '2016'

if (hora >= 1) & (hora <= 5):
    hora = int(hora)
    hora = 19 + hora
    dia1 = dia1 - 1
    dia1 = str(dia1)
else:
    hora = int(hora)
    hora = hora - 5
    hora = str(hora)
                       
time = year+'-'+mes+'-'+dia1+' '+hora+':'+minu+':'+seg
latitud = '11.0193'
longitud = '-74.8504'
bd = mysql.connector.connect(user='root', password='1234', host='localhost', database='coordenadas')
cursor = bd.cursor()
add_coordinate = ("INSERT INTO cordenadas (latitud, longitud, time) VALUES (%s, %s, %s)")
data_coordinate = (latitud, longitud, time)
cursor.execute(add_coordinate, data_coordinate)
bd.commit()
cursor.close()
bd.close()

print("hecho")
