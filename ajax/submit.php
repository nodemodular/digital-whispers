<?php

include_once 'conn.php';

$uploaddir = '../data/trash/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
	echo $_FILES['userfile'];
	
<<<<<<< HEAD
	$send = "INSERT INTO data (filename) VALUES ('".$_FILES['userfile']['name']."')";
=======
	$send = "INSERT INTO data (filename, filetype) VALUES ('".$_FILES['userfile']['name']."', '".$_FILES['userfile']['type']."')";
>>>>>>> 38d7a76535b2af5e6b891a3ceef35ac49e601dab
	mysql_query($send) OR die(mysql_error());
	
} else {
	echo "error";
}

?>

