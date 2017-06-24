<?php
# This variable has the username and password for the display.Changing the password 
# or user requires a change of $con

$con=mysql_connect("localhost","root","root");  

#MariaDB syntax for connecting to the server and select the table of wavedata

mysql_select_db("wavedata",$con);

#mysql query in php that allows for the data to be viewed by descending values based on
#local time

$result=mysql_query("SELECT * FROM data ORDER BY column1 DESC LIMIT 10",$con);


#This is the html code that will be pushed to the index.php to be refreshed

echo "<table border='1'>
<tr>
<td align=center> <b>Date</b></td>
<td align=center><b>Data</b></td>

</td>";

#This allows for new values to be obtained from the server. Table formatting happens here
while ($con){
while ($row=mysql_fetch_array($result))
	
{
	
	echo "
		<tr>

		<td>".$row['column1']."</td>
		<td align='center' width='100%' height='20%'><b><font size='10'>".$row['column2']."</font size></b></td>

		</tr>";
	
}
}
while(!$con){
$con=mysql_connect("localhost","root","root");  
mysql_select_db("wavedata",$con);
sleep(3);
}

?>