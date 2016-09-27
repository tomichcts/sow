

<?php 
session_name("Sow2016");
session_start();
$idamostrar= $_SESSION['id_escuela'];

include("../00_assets/config.php");
 $A_cantidad=$_GET["cant_alumnos"];
 $A_idalumnos=$_GET["id_alumnos"];
 $calculo=0;
 $verbal=0;
 $fisico=0;
 $creativo=0;
 $fisico_T=0;
 $creativo_T=0;
 $verbal_T=0;
 $calculo_T=0;
 $fisico_T_V=0;
 $calculo_T_V=0;
 $creativo_T_V=0;
 $verbal_T_V=0;
 $id_victima=$_GET["victima"];
 //hacemos la consulta a la base de datos para calcular las inteligencias multiples dependiendo de la cantidad de alumnos que mandamos
 for($a=0;$a<count($A_cantidad);$a++)
 {
	$id=$A_idalumnos[$a];
	$cant=$A_cantidad[$a];
	$sql=" SELECT `im_calculo` , `im_verbal` , `im_fisico` , `im_creativo` FROM `cts_schoolwars`.`01_unidades` WHERE id=$id";
	 $resultado=mysqli_query($conexion,$sql);
	 
	 while($fila=mysqli_fetch_array($resultado))
		{
			$fisico=$fila["im_fisico"];
			$creativo=$fila["im_creativo"];
			$verbal=$fila["im_verbal"];
			$calculo=$fila["im_calculo"];
		 }
 $fisico_T=$fisico_T+$fisico*$cant;
 $creativo_T=$creativo_T+$creativo*$cant;
 $verbal_T=$verbal_T+$verbal*$cant;
 $calculo_T=$calculo_T+$calculo*$cant;
 }
 
 echo "fisico =". $fisico_T ."<br>";
 echo "verbal =". $verbal_T."<br>";
 echo "calculo =". $calculo_T."<br>";
 echo "creativo =". $creativo_T. "<br>";
 
 //Traemos los datos del usuario al que vamos a atacar
 $sql="SELECT `01_unidades_user`.`cantidad` , `01_unidades`.`im_creativo` , `01_unidades`.`im_fisico` , `01_unidades`.`im_verbal` , `01_unidades`.`im_calculo` FROM `cts_schoolwars`.`01_unidades` INNER JOIN `cts_schoolwars`.`01_unidades_user` ON (`01_unidades`.`id` = `01_unidades_user`.`id_unidad`) WHERE 01_unidades_user.id_escuela=$id_victima ;";
 
 $resultado=mysqli_query($conexion,$sql);
	 
	 while($fila=mysqli_fetch_array($resultado))
		{
			$fisico=$fila["im_fisico"];
			$creativo=$fila["im_creativo"];
			$verbal=$fila["im_verbal"];
			$calculo=$fila["im_calculo"];
		 }
		 
 $fisico_T_V=$fisico_T_V+$fisico*$cant;
 $creativo_T_V=$creativo_T_V+$creativo*$cant;
 $verbal_T_V=$verbal_T_V+$verbal*$cant;
 $calculo_T_V=$calculo_T_V+$calculo*$cant;
 echo "Estadisticas de tu oponente <br> ";
 echo "fisico =". $fisico_T_V ."<br>";
 echo "verbal =". $verbal_T_V."<br>";
 echo "calculo =". $calculo_T_V."<br>";
 echo "creativo =". $creativo_T_V. "<br>";
 echo "id de la victima ".$id_victima;
 
 $Total=$creativo_T+$verbal_T+$calculo_T+$fisico_T;
 $Total_V=$fisico_T_V+$creativo_T_V+$verbal_T_V+$calculo_T_V;
 echo $Total_V."<br>";
 echo $Total;
 if($Total<$Total_V)
 {
	 echo "Perdiste!";
 }
 else
 {
	 echo "Ganaste!";
 }
 
 ?>
 
 
 