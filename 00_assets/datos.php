<?php

// si estoy logueado  busco los datos si no, voy abajo del todo y hago login
if (isSet($_SESSION['id_escuela'])){

	$id_escuela= $_SESSION['id_escuela'];


/*--------------------------------------------------------------
*
*	Datos de la escuela y actualizacion de recursos
*
*--------------------------------------------------------------*/
	//Datos de la escuela
	
	//$sql="INSERT INTO `db_schoolwars`.`00_escuelas` (`tiempo`, `dinero`, `dinero_xhora`) VALUES ('$timepo', '$dinero', '765'); ";
	$sql = "SELECT * FROM `00_escuelas` WHERE id='$id_escuela'";
	$query = mysqli_query($conexion, $sql);

	while ($fila=mysqli_fetch_array($query)){
	
		//recursos ( inteligencias multiples)
		$im_fisico= $fila["im_fisico"];
		$im_creatividad= $fila["im_creatividad"];
		$im_calculo= $fila["im_calculo"];
		$im_verbal=$fila["im_verbal"];

		//otros recursos
		$rec_popularidad= $fila["rec_popularidad"];
		$rec_dinero= $fila["rec_dinero"];
		$rec_matricula= $fila["rec_matricula"];

		//Datos Varios
		$escuela_nombre= $fila["nombre"];

		//otras variables
		$nivel_aula= 0;
		$sqlAula="SELECT nivel FROM `02_edificios_user` WHERE id_escuela = $id_escuela AND id_edificio = 2;";
		$queryAula= mysqli_query($conexion, $sqlAula);
		while($filaAula=mysqli_fetch_array($queryAula)){
			$nivel_aula=$filaAula['nivel'];
		}

		$segundos=0;
		$diferencia=0;
		
		$t_actual = time();
		$t_ultimo_acceso=$fila["tiempo"];
		
		$segundos=$t_actual-$t_ultimo_acceso;
		$rec_matricula=$nivel_aula*10;				// calculo matricula
		//$rec_popularidad+=0.001*$segundos;			// calculo popularidad (se actualiza cuando inauguro edificios, etc...)
		$rec_dinero+=$rec_matricula*$segundos/20;	// calculo dinero
		
		$_SESSION["ultimo_acceso"]=$t_actual;

		
		//Actualizar recursos
		$sqlUpdate = "UPDATE `00_escuelas` SET 
					`tiempo` = '$t_actual' ,
					`rec_dinero` = '$rec_dinero' ,
					`rec_matricula` = '$rec_matricula' ,
					`im_fisico` = '$im_fisico' ,
					`im_creatividad` = '$im_creatividad' ,
					`im_calculo` = '$im_calculo' ,
					`im_verbal` = '$im_verbal'
				WHERE `id` = '$id_escuela'";
		$query2 = mysqli_query($conexion, $sqlUpdate);
		
	}
	

/*--------------------------------------------------------------
*
*	Datos de los Alumnos
*
*--------------------------------------------------------------*/
//Tipos de alumnos
$sql = "SELECT * FROM `01_unidades`";
$query = mysqli_query($conexion, $sql);

		$A_idAlumnos=array();
		$A_alumnos=array();
		$A_descAlumnos=array();
		$A_fotosAlumnos=array();
		
	while ($fila=mysqli_fetch_array($query)){

		array_push($A_idAlumnos,$fila['id']);
		array_push($A_alumnos,$fila['titulo']);
		array_push($A_descAlumnos,$fila['descripcion']);
		array_push($A_fotosAlumnos,$fila['imagen']);

	}


/*--------------------------------------------------------------
*
*	Datos de los Edificios Generales y Propios
*
*--------------------------------------------------------------*/
	$sql="SELECT `02_edificios_user`.* , `02_edificios`.* FROM `02_edificios_user` INNER JOIN `02_edificios` ON (`02_edificios_user`.`id_edificio` = `02_edificios`.`id`) WHERE (`id_escuela` = '".$id_escuela."') ORDER BY id_edificio ASC;";
	$query = mysqli_query($conexion, $sql);

	$estoy_construyendo = 0;
	
	// datos generales de los edificios
	$A_idEdificios=array();
	$A_Edificios=array();
	$A_descEdificios=array();
	$A_fotosEdificios=array();
	
	$A_tiempoEdificiosBase=array();
	$A_precioEdificiosBase=array();
	
	// datos de Mis Edificios
	$A_misEdificios_nivel=array();
	$A_misEdificios_tiempo=array();
	$A_misEdificios_construyendo=array();
		
	while ($fila=mysqli_fetch_array($query)){

		// Datos de edificios generales
		array_push($A_idEdificios,$fila['id']);
		array_push($A_Edificios,$fila['titulo']);
		array_push($A_descEdificios,$fila['descripcion']);
		array_push($A_fotosEdificios,$fila['imagen']);

		array_push($A_tiempoEdificiosBase, $fila['req_tiempo']);
		array_push($A_precioEdificiosBase, $fila['req_dinero']);
		
		// Datos de mis edificios
		array_push($A_misEdificios_tiempo,$fila['tiempo_click']);
		array_push($A_misEdificios_construyendo,$fila['construyendo']);
		array_push($A_misEdificios_nivel,$fila['nivel']);
		
		
		// Si estoy construyendo algun edificio incremento el contador
		if($fila['construyendo'] > 0){

			$estoy_construyendo = $fila['id_edificio'];
			$ID = $fila['id_edificio'];
			$nivelEdif = $fila['nivel']+1;
			$segundos = $t_actual - $fila['tiempo_click'];
			
			$tiempoBase=$fila['req_tiempo'];
			
			$tiempoEdif = calcularTiempo($nivelEdif,$tiempoBase);
			$faltan_para_terminar=$tiempoEdif-$segundos;
		}
		
		

		
	}	
	

/*--------------------------------------------------------------
*
*	Datos de Profesores
*
*--------------------------------------------------------------*/
	$A_id_profesores=array("1","2","3","4");
	$A_profesores=array("tomi","melina","chirino","amodeo");
	$A_precioProfesores=array("150","250","350","450");
	$A_fotosProfesores=array("nachoo.png","yo.png","abril.png","jc.png");
	$A_tiempoConstruccion=array("5","10","15","20");
	
	
	
	
	
	
	


} else {

/*
	$usuario="Juan";
	$password="1234";
	//$_SESSION['id_escuela']=1;
*/
}



?>