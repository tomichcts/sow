<?php
	session_name('Sow2016');
	session_start();
	session_destroy();

	$url='./login.php';
	Header("location: $url");
?>