<?php 
include("../00_assets/config.php");
?>
 <?php
 $id=$_POST['id'];

$sql="SELECT
    `02_edificios`.`id`
    , `02_edificios`.`titulo`
    , `02_edificios`.`descripcion`
    , `02_edificios`.`imagen`
    , `02_edificios`.`req_dinero`
    , `02_edificios_user`.`nivel`
    , `02_edificios`.`req_tiempo`
    , `02_edificios_user`.`tiempo_final`
    , `02_edificios_user`.`id_edificio`
	, `02_edificios_user`.`construyendo`
FROM
    `cts_schoolwars`.`02_edificios`
    LEFT JOIN `cts_schoolwars`.`02_edificios_user` 
        ON (`02_edificios`.`id` = `02_edificios_user`.`id_edificio`)
		WHERE 02_edificios.id= $id;";

$resultado= mysqli_query($conexion, $sql);
	while($fila=mysqli_fetch_array($resultado)){
		$id=$fila['id'];
		$nombre=$fila['titulo'];
		$descripcion=$fila['descripcion'];
		$imagen=$fila['imagen'];
		$costo=$fila['req_dinero'];
		$nivel=$fila['nivel'];
		$tiempo=$fila['req_tiempo'];
		$construyendo=$fila['construyendo'];
		$tiempo_final=$fila['tiempo_final'];
		$id_edificio=$fila['id_edificio'];
		
		
		$siguiente_nivel=$nivel+1;
		$tiempo_construccion= $siguiente_nivel*$tiempo;
		$plata_contruccion= $siguiente_nivel*$costo;
		
	}
?>	
	<img src="img/<?=$imagen?>" width="200"></img>
	<h2><?=$nombre?> (nivel <?=$nivel?>)</h2>
	<h5><?=$descripcion?></h5>
<?php	

$tiempo_ahora=time();

$diferencia_hora=$tiempo_final-$tiempo_ahora;



//echo $diferencia_hora;


	if($diferencia_hora>0){
		$minutos=$diferencia_hora/60;
		$minutos=floor($minutos);
		$resultado=$diferencia_hora-$minutos*60;
		
		echo 'faltan'.$minutos.'min'.$resultado.'seg'.'<br>';
	}else{
		$sql="UPDATE `02_edificios_user` SET `construyendo` = '0'
		WHERE `id` = $id AND `construyendo` = '1' ;"; 
	}

	if($construyendo==1){
		
		
		echo 'estoy construyendo';
		
	}else{
		
?>

	
	<h3>Nivel <?=$siguiente_nivel?> requiere: </h3>
	<h4><i class="fa fa-clock-o"></i>  Tiempo: <?=$tiempo_construccion?> minutos</h4> 
	<h4><i class="fa fa-money"></i> <i class="fa fa-dollar"> <?=$plata_contruccion?> </i></h4>
	<a href="#" class="btn btn-success btn_construir" id_edi= "<?=$id?>" ><i class="fa fa-wrench"></i>construir</a> 

	<?php } ?>