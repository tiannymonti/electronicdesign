## sensor
import RPi.GPIO as GPIO
import time
import serial

syrus = serial.Serial('/dev/ttyUSB0',baudrate=115200)
def medidas():
    GPIO.setmode(GPIO.BCM)

    TRIG = 2
    ECHO = 3

    GPIO.setup(TRIG,GPIO.OUT)
    GPIO.setup(ECHO,GPIO.IN)


    GPIO.output(TRIG, False)
    print "Esperando distancia.."
    print " "
    time.sleep(2)
    GPIO.output(TRIG, True)
    time.sleep(0.00001)
    GPIO.output(TRIG, False)
    while GPIO.input(ECHO)==0:
        pulse_start = time.time()

    while GPIO.input(ECHO)==1:
        pulse_end = time.time()

    pulse_duration = pulse_end - pulse_start

    distance = pulse_duration * 17150

    distance = round(distance, 2)## redondea el valor

    print "Distance:",distance,"cm"
    return distance
    GPIO.cleanup()

while True:
    m = medidas()
    syrus.write(str(m))
    print(m)
    time.sleep(0.5)

