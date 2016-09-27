<?php
require ("config.php");
if(isset($_GET["usu"]))
{
	if(isset($_GET["contra"]))
	{
		if(isset($_GET["esc"]))
		{
			$nick=$_GET["nick"];
			$usuario=$_GET["usu"];
			$pass=$_GET["contra"];
			$name=$_GET["esc"];
			
			$sql="INSERT INTO `00_usuarios` (`usuario`, `email`, `pass`) VALUES ('$nick', '$usuario', '$pass')";
			$query = mysqli_query($conexion,$sql);
			$ultimoid=mysqli_insert_id($conexion);
			
			
			
			$hora=time();
			$plata=1500;
			$sql="INSERT INTO `00_escuelas`(`tiempo`,`nombre`,`id_usuario`,`rec_popularidad`,`rec_dinero`,`im_fisico`,`im_creatividad`,`im_calculo`,`im_verbal`) VALUES('$hora','$name','$ultimoid','0','$plata','0','0','0','0')";
			$query = mysqli_query($conexion,$sql);
			echo $sql;
			$idescuela=mysqli_insert_id($conexion);
			
			$update="UPDATE `00_usuarios` SET `id_escuela` = '$idescuela' WHERE `id` = '$ultimoid';";
			$query =  mysqli_query($conexion,$update);
			
			
			
				// Agrego el campus en 0
	$sql3="INSERT INTO `02_edificios_user` (`id_edificio`, `id_escuela`, `nivel`, `tiempo_click`) VALUES ('1', '$idescuela','0','$hora'); ";
	$query3=mysqli_query($conexion,$sql3);
		}
	}
}
?>