import sqlite3
import cv2
import os 
from os.path import exists as file_exists
from datetime import datetime
 
con = sqlite3.connect('Personas')
cur = con.cursor()

eliminar = "DELETE FROM usuarios WHERE id='{}'"
Nombre = "SELECT nombre FROM usuarios WHERE curp='{}'"
IDS = "SELECT id FROM usuarios WHERE curp='{}'"
nuevo = "INSERT INTO usuarios VALUES (NULL ,'{}','{}' );" 
# commands for sqlite3  

class persona:
    def __init__(self,QR):
        self.qr = QR 
    def nombre(self):
        cur.execute(Nombre.format(self.qr))
        return cur.fetchall()[0][0]
    def id(self):
        cur.execute(IDS.format(self.qr))
        return cur.fetchall()[0][0]
    def existe(self):
        cur.execute(Nombre.format(self.qr))
        return bool(cur.fetchall()) 



def getDia() :
    dia = datetime.now() 
    return str(dia.month) +"|"+ str(dia.day) +"|"+ str(dia.year)


def listas() : 
    listasEn = os.listdir('list')
    print("\n\t[*]Tus listas")
    for i in listasEn :
        print(f"\t\t[-]{i}") 
    print("")
    return 

def check(Qr,ls):
    per =  persona(Qr)
    if per.existe() :
        if  not file_exists("list/"+ls+"/"+getDia()+"/"+Qr ) :  
            print(per.nombre(),"con Asistencia")
        return True 
    else :
        print(f"Usuario no registrado D:{Qr}")
    return False 
         

def leercam(listafor):
    # initalize the cam
    cap = cv2.VideoCapture(0)

    # initialize the cv2 QRCode detector
    detector = cv2.QRCodeDetector()

    while True:
        _, img = cap.read()

        # detect and decode
        data, bbox, _ = detector.detectAndDecode(img)

        # check if there is a QRCode in the image
        if bbox is not None:
            # display the image with lines
            
            for i in range(len(bbox)):
                # draw all lines
                pass

            if data:
                if data == "Terminar" : 
                    return 
                if check(data,listafor) : 
                    if not file_exists("list/"+listafor+"/"+getDia()+"/"+data ) : 
                        nuevaAsistencia = open("list/"+listafor+"/"+getDia()+"/"+data , "w+")
                        nuevaAsistencia.write("05/09/2022") 


        # display the result
        cv2.imshow("img", img)
        
        if cv2.waitKey(1) == ord("q"):
            break

    cap.release()
    cv2.destroyAllWindows()

def main():
    listas()
    verList = input("Lista: ");
    if not file_exists("list/"+verList+"/"+getDia()) :
        os.mkdir("list/"+verList+"/"+getDia())
    leercam(verList)

if __name__ == '__main__':
    main()
