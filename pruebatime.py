import mysql.connector
import mysql
time = '2016-09-13 10:59:29'
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
