<?php
	
	include("../00_assets/config.php");

	$A_cant=$_POST["alumnos"];
	$A_unidad=$_POST["id_alumnos"];
	
	
	$id_escuela = 2;
	
	
	for($i=0; $i<count($A_cant);$i++){
	$cantidad= $A_cant[$i];
	$id_unidad= $A_unidad[$i];
		$sql= "INSERT INTO `cts_schoolwars`.`01_unidades_user` (`id_unidad`, `id_escuela`, `nivel`, `cantidad`) VALUES ('$id_unidad', '$id_escuela', '1', '$cantidad');";	
		echo $sql."<hr>";
		$resultado=mysqli_query($conexion,$sql);
	}

	

	
?>