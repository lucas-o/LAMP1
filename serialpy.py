#This file is started by ~/.config/lxsession/LXDE-pi. There is a line of code that calls
#the python file at the very bottom. Code: sudo python serialpy.py
#See more at rasberrypi.stackexchange.com/questions/8734/execute-script-on-start-up


import pymysql
import pymysql.cursors
import pymysql.connections
import time
import datetime
import serial
import os
import random

#Lots of things imported, however doesn't effect performance terribly

#pymysql here to call onto the server and to have the ability to insert data

db=pymysql.connect(host='localhost', user='root', passwd='root', db='wavedata', autocommit=True)
cursor = db.cursor()

#serial settings for the serial. Change as needed. 

ser= serial.Serial(
	port='/dev/ttyUSB0',
        baudrate=9600,
	parity=serial.PARITY_NONE,
	bytesize=serial.EIGHTBITS,
        
	)

#Method for reading the serial data. Allows for the string escape to access new data.

def reader():
	value=ser.read(23)
	time.sleep(.1)
	return value;

#syntax for the insert query in SQL. 

add_4=("INSERT INTO data(column1, column2) VALUES(localtime, %s)")
	 
#Trouble shooting method for the serial if there is no data. Call printer instead of
#reader

def printer():
	random.randint(0,5)
	time.sleep(.2)
	return random.randint(0,5);

#Time for column 1. DO NOT USE THE SERVER TIME.
localtime= time.asctime(time.localtime(time.time()))

#This safely inserts the data while avoiding the risk of outside insertion from the 
# string escape. 

while cursor != 0:
	print reader()
	cursor.execute(add_4, (reader()))
	db.commit()
	

