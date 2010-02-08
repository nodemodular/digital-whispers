<?php

$uploaddir = '../data/trash/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
	echo "success";
	// Datenbankeintrag
} else {
	echo "error";
}

?>

