<?php
header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");
$dbhost = 'localhost';
$dbuser = 'arm16';
$dbpass = 'arm16';
$dbname = 'arm16';
$dbtable = 'weather';



$q=$_GET["Location"];


$con = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$con)
 {
 	die('Could not connect: ' . mysql_error());
 }
$dbselect = mysql_select_db($dbname,$con);

$sql="SELECT * FROM $dbtable WHERE Location='$q'";

$result = mysql_query($sql);

echo '<?xml version="1.0" encoding="ISO-8859-1"?><weather>';

while($row = mysql_fetch_array($result))
 {
 
	echo "<weather>";
 	echo "<time>".$row['time']."</time>";
 	echo "<warning>".$row['warning']."</warning>";
 	echo "<weather>".$row['weather']."</weather>"; 	
	echo "<precip>".$row['precip']."</precip>";
    echo "<temp>".$row['temp']."</temp>"; 
	echo "<wspeed>".$row['wspeed']."</wspeed>";
 	echo "<wdirection>".$row['wdirection']."</wdirection>";
 	echo "<wgusts>".$row['wgusts']."</wgusts>";
 	echo "<visibility>".$row['visibility']."</visibility>";
 	echo "<humidity>".$row['humidity']."</humidity>";
	echo "</weather";
	}
	echo "</weather>";

mysql_close($con);

?>
