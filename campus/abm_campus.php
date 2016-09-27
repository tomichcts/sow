<?php 
session_start();
?>
<?php
include("../00_assets/config.php");
$tiempo_ahora=time();
$id=$_POST['id'];
$id_escuela=$_SESSION['id_escuela'];
$midinero=0;
$minivel=0;
$tiempo=0;
$dinero=0;


// obtengo mi plata
$sql= "SELECT  rec_dinero FROM `00_escuelas` WHERE id=$id_escuela; ";
$resultado= mysqli_query($conexion, $sql);
while($fila=mysqli_fetch_array($resultado)){
		$midinero=$fila['rec_dinero'];
}
echo $midinero;

$sql="SELECT
    `02_edificios`.`req_tiempo`,
	`02_edificios`.`req_dinero`,
    `02_edificios_user`.`nivel`,
	`02_edificios_user`.`id`
FROM
    `cts_schoolwars`.`02_edificios_user`
    INNER JOIN `cts_schoolwars`.`02_edificios` 
        ON (`02_edificios_user`.`id_edificio` = `02_edificios`.`id`)
WHERE `02_edificios`.`id`=$id ;";
		
$resultado= mysqli_query($conexion, $sql);
//echo $sql;
while($fila=mysqli_fetch_array($resultado)){
		//datos del edificio
		$tiempo=$fila['req_tiempo'];
		$dinero=$fila['req_dinero'];
		$id_user=$fila['id'];
		//datos de mis edificios
		$minivel=$fila['nivel']+1;
}


$demora=$tiempo*60*$minivel;
$tiempo_final=$tiempo_ahora+$demora;

$midinero=$midinero-($dinero*$minivel);

	if($midinero>0){
		$sql="UPDATE `02_edificios_user` SET `nivel` = '$minivel',`tiempo_click` = '$tiempo_ahora',  `construyendo`='1',`tiempo_final` = '$tiempo_final' WHERE `id` = '$id_user';  ";
		$resultado= mysqli_query($conexion, $sql);
		//echo $sql;
		echo "edificio en construccion";
	}else{
		echo "no alcanza el dinero";
	}





	//echo $sql;
?>