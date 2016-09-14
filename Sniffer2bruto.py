## Sniffer
#!/usr/bin/env python
import mysql.connector
import mysql

from socket import*
IPserver = "172.31.21.200"
Portserver = 5601
global latitud
global longitud
global time
SockServer = socket(AF_INET, SOCK_DGRAM) 
SockServer.bind((IPserver, Portserver))

#recibir un paquete en un RAW socket
while True:
    print("A la espera de paquete...")
    data1, addr = SockServer.recvfrom(1024)
    data1 = str(data1)
    #data1=data1.decode('utf-8')
    print("Paquete recibido desde " + str(addr))
    print("Informacion Recibida: " + data1)
    print (repr(data1))
    
    n = data1.find('>RPV')
    n1 = data1.find('>RTM')
    
    data2 = data1[n1:32 + n1]
    data = data1[n:34 + n]
    if n >= 0:
        if data[0:4] == ">RPV":
            print("Coordenadas Recibidas!" + data)
            latInt = data[9:12]
            longInt = data[17:21]
            latDec = data[12:17]
            longDec = data[21:26]
            latitud = latInt + "." + latDec
            longitud = longInt + "." + longDec
            bandera2 = 1

    elif (n1 >= 0):
        if data2[0:4] == ">RTM":
            hora = data2[4:6]
            print(hora)
            minu= data2[6:8]
            seg = data2[8:10]
            dia1 = data2[13:15]
            print(dia1)
            mes = data2[15:17]
            year = data2[17:21]
            bandera1 = 1

            if (hora >= 0) & (hora <= 5):
                hora = int(hora)
                hora = 19 + hora
                print(hora)
                dia1 = dia1 - 1
                dia1 = str(dia1)
                print(dia1)
            else:
                hora = int(hora)
                hora = hora - 5
                hora = str(hora)
                print(hora)
                       
	time = year+'-'+mes+'-'+dia1+' '+hora+':'+minu+':'+seg
           
    else:
        print("ERROR en dato")
        bandera1 = 0
	bandera2 = 0
        
    if ((bandera1 == 1) & (bandera2 == 1)):
	print("tiempo")
		
	
        bd = mysql.connector.connect(user='root', password='1234', host='localhost', database='coordenadas')
        cursor = bd.cursor()
	
        add_coordinate = ("INSERT INTO cordenadas (latitud, longitud, time) VALUES (%s, %s, %s)")
	data_coordinate = (latitud, longitud, time)
	print(time)
	cursor.execute(add_coordinate, data_coordinate)
	bd.commit()
	cursor.close()
	bd.close()

SockServer.close()
