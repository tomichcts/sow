<?php
	
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '12345');
    define('DB_DATABASE', 'cts_schoolwars');

	//$conexion = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	if(!$conexion) { die('Fallo la conexion al servidor: ' . mysqli_error());}
	
	// INICIO  para que almacene con acentos
	mysqli_set_charset($conexion,"utf8");
	
	date_default_timezone_set("America/Argentina/Buenos_Aires");
?>