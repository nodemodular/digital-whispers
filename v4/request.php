<?

include_once '../ajax/conn.php';

$query = "SELECT * FROM data ORDER BY priority DESC, id DESC LIMIT 0,1";
$result = mysql_query($query) or die("Anfrage fehlgeschlagen: " . mysql_error());
$data = mysql_fetch_array($result);

echo $data["filename"];


?>