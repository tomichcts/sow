<?php
session_name("Sow2016");
session_start();
require("00_assets/datos.php");
?>
<html>
<head>
<body>

<form action="00_assets/login.php" method="POST">
	<p> Usuario <input type="text" name="usu"></input></p>
	<p> Password <input type="password" name="contra"></input></p>
	<p> <input type="submit"> </input></p>
<a href="registrar.php"> Registrarse </a>
	</form>

<?php


if (isSet($_GET['e'])){
	$e=$_GET['e'];
	switch ($e){
		case 1:
			echo "Datos incorrectos"; break;
		case 2:
			echo "Ingrese un usuario"; break;
	}
}

if (isSet($_SESSION['id_escuela'])){
	header("location:./index.php");
}
?>
</body>
</html>