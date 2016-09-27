<?php
require ("assets/funcionesCompartidas.php"); // funciones del sitio
require ("assets/config.php"); // archivo de configuracion
require ("assets/datos.php"); // datos para mostrar en pantalla (recursos, edificios, alumnos, profes, etc..)
//se podr'ia mejorar si a datos lo llamamos con el parametro para solo buscar los datos que corresponda x seccion
?>
<html>
<head>
</head>
<body>
<form action="assets/registrarse.php">

<p> Email </p><input type="text" name="usu"/>
<p> Password </p> <input type="text" name="contra">
<p> Nick </p> <input type="text" name="nick">
<p> Nombre de tu escuela </p> <input type="text" name="esc">  

<input type="submit"/>

</form>
</body>

</html>