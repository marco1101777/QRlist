import sqlite3

con = sqlite3.connect('Personas')
cur = con.cursor()
# cur.execute("SELECT  FROM usuarios ")
# todos = cur.fetchall()
# commands for sqlite3 
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
		return cur.fetchall()
	def existe(self):
		cur.execute(IDS.format(self.qr))
		return bool(cur.fetchall()) 



def main():
	per = persona("ROCM040111HMNDRRA8") 
	print(per.nombre());
	


if __name__ == '__main__':
	main()

