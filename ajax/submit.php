<?php

include_once 'conn.php';

$uploaddir = '../data/trash/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
	echo "success";
	
	$send = "INSERT INTO data (filename) VALUES ('".$_FILES['userfile']['tmp_name']."')";
	mysql_query($send) OR die(mysql_error());
	
} else {
	echo "error";
}

?>

