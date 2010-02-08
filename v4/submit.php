<?

include_once '../ajax/conn.php';

$time = time();
$send = "UPDATE data (time_edit) VALUES ('".date("Y-m-d H:i:s", $time)."')";
mysql_query($send) OR die(mysql_error());	

?>