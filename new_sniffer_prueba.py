##'>RTX\\3EholA\\3C\\0A;EV001147203270+0000000+0000000000000090;ID=GRUPO1<\r\n'
##'>RTX\\3EholA\\3C\\0A;EV001599462982+2578391-0802945201228512;ID=GRUPO1<\r\n'
import datetime
import mysql.connector
import mysql
from socket import*
IPserver = "172.31.21.200"
Portserver = 5601
SockServer = socket(AF_INET, SOCK_DGRAM) 
SockServer.bind((IPserver, Portserver))
#data1 = '>RTX\\3EholA\\3C\\0A;EV481477366110+2578391-0802945201228512;ID=GRUPO1<\r\n'
#data1 = '>RTX\\3EholA\\3C\\0A;EV001477366110+0000000+0000000000000090;ID=GRUPO1<\r\n'
while True:
    print("A la espera de paquete...")
    data1, addr = SockServer.recvfrom(1024)
    data1 = str(data1)
    #data1=data1.decode('utf-8')
    print("Paquete recibido desde " + str(addr))
    print("Informacion Recibida: " + data1)
    print (repr(data1))
    data1 = str(data1)
    n = data1.find('>RTX')
    n2 = data1.find(';EV')
    n3 = data1.find(';ID=')
    bandera = 0
    print(data1[0:4],n2)
    if n >= 0:
        if data1[0:4] == ">RTX":
            sensor = data1[7:n2-6]
            print("medida en cm",sensor)
            
            print("laInt",data1[n2+15:n2+18])
            print("latDec",data1[n2+18:n2+23])
            latInt = data1[n2+15:n2+18]
            latDec = data1[n2+18:n2+23]
            
            print("longInt",data1[n2+23:n2+27])
            print("longDec",data1[n2+27:n2+32])
            longInt = data1[n2+23:n2+27]
            longDec = data1[n2+27:n2+32]
            latitud = latInt + "." + latDec
            longitud = longInt + "." + longDec
            
            print(latitud,longitud)
            print("signal",data1[n3-2:n3])
            bandera = 1
            signal= data1[n3-2:n3]
            if int(signal)==90:
                bandera=0


            
            Tstamp=data1[n2+5:n2+15]
            print(Tstamp)
            #Tstamp="1477365123"
            #Tstamp="1147203270"
            #Tstamp="1284101485" ##
            time = datetime.datetime.fromtimestamp(int(Tstamp)).strftime('%Y-%m-%d %H:%M:%S')
            print(time)

            
        else:
            print("ERROR en dato")
            bandera = 0
        if (bandera == 1):
            print("Escribe en base de datos...")
            bd = mysql.connector.connect(user='root', password='1234', host='localhost', database='coordenadas')
            cursor = bd.cursor()
            
            add_coordinate = ("INSERT INTO cordenadas (latitud, longitud, time,sensor) VALUES (%s, %s, %s, %s)")
            data_coordinate = (latitud, longitud, sensor)
            
            cursor.execute(add_coordinate, data_coordinate)
            bd.commit()
            cursor.close()
            bd.close()

SockServer.close()



##
