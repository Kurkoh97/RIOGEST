import mysql .connector

conexion = mysql.connector.connect(user='root',
                                   password='root',
                                   host='localhost',
                                   database='SIMAS'
                                   ,port=3306)
print("Conexión exitosa a la base de datos MySQL")