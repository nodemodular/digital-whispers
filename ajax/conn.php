<?

	if ($_SERVER['SERVER_NAME'] == "localhost") {
						
		$host = "localhost";
	
	} 

$user = "root"; 
$pass = "";
$db	  = "digitalwhispers";

	
	$link = mysql_connect($host, $user, $pass) or die("Keine Verbindung möglich: " . mysql_error());
	mysql_select_db($db) or die("Auswahl der Datenbank fehlgeschlagen");

	

?>

