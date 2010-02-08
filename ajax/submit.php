<?php

include_once 'conn.php';

$uploaddir = '../data/trash/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
	echo $_FILES['userfile'];
	
	$send = "INSERT INTO data (filename, filetype) VALUES ('".$_FILES['userfile']['name']."', '".$_FILES['userfile']['type']."')";
	mysql_query($send) OR die(mysql_error());
	
} else {
	echo "error";
}

?>

