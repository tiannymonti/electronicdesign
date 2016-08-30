## Sniffer
import mysql.connector
##import mysql

from socket import*
IPserver = "181.52.77.178"
Portserver = 5610

SockServer = socket(AF_INET, SOCK_RAW, IPPROTO_UDP) # RAW socket
SockServer.bind((IPserver, Portserver))

#recibir un paquete en un RAW socket
while True:
    print("A la espera de paquete...")
    data1, addr = SockServer.recvfrom(1024)
    data1 = str(data1)
    #data=data1.decode('utf-8')
    print("Paquete recibido desde " + str(addr))
    print("Informacion Recibida: " + data1)
    print ('Received', repr(data1))
    
    n = data1.find('>RPV')
    n1 = data1.find('>RTM')
    
    data2 = data1[n1:32 + n1]
    data = data1[n:34 + n]
    if n > 0:
        if data[0:4] == ">RPV":
            print("Coordenadas Recibidas!" + data)
            latInt = data[9:12]
            longInt = data[17:21]
            latDec = data[12:17]
            longDec = data[21:26]
            latitud = latInt + "." + latDec
            longitud = longInt + "." + longDec

            bd = mysql.connector.connect(user='root', password='1234',
                host='localhost', database='coordenadas')

            cursor = bd.cursor()

            add_coordinate = ("INSERT INTO cordenadas ( latitud, longitud) VALUES (%s, %s)")
            data_coordinate = (latitud, longitud)
            cursor.execute(add_coordinate, data_coordinate)
            bd.commit()
            cursor.close()
            bd.close()
    elif (n1 > 0):
        if data2[0:4] == ">RTM":
            hora = data2[4:6]
            minu= data2[6:8]
            seg = data2[8:13]
            dia1 = data2[13:15]
            mes = data2[15:17]
            year = data2[17:21]

            if (hora >= 1) & (hora <= 5):
                hora = int(hora)
                hora = 19 + hora
                dia1 = dia1 - 1
            else:
                hora = int(hora)
                hora = hora - 5
                       
            
            bd = mysql.connector.connect(user='root', password='1234',
                host='localhost', database='coordenadas')

            cursor = bd.cursor()
            
            add_coordinate = ("INSERT INTO time (dia, mes, yr, hora, min, seg) VALUES (%s, %s, %s, %s, %s, %s)")
            data_coordinate = (dia1, mes, year, hora, minu, seg)
            cursor.execute(add_coordinate, data_coordinate)
            bd.commit()
            cursor.close()
            bd.close()
           
           
    else:
        print("ERROR en dato")

SockServer.close()
