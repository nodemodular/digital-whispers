<?
	$host = "localhost";
	$user = "root"; 
	$pass = "root";
	$db	  = "digitalwhispers";
	
	$link = mysql_connect($host, $user, $pass) or die("Keine Verbindung möglich: " . mysql_error());
	mysql_select_db($db) or die("Auswahl der Datenbank fehlågeschlagen");


?>

