<form id="enviandoalumnosform" method="GET">
<table class="table table-hover">
		<thead>
		<tr> 
		<th>Alumnos</th>
		<th>Cantidad</th>
		<th>Descripcion</th>
		<th></th>
		</tr>
		
		</thead>
		
	<tbody>

<?php
session_name("Sow2016");
session_start();
include("../00_assets/config.php");
$idamostrar= $_SESSION['id_escuela'];
$id_victima=$_GET["id"];
$sql="
SELECT
    `01_unidades`.`titulo`
	, `01_unidades_user`.`id_unidad`
    , `01_unidades_user`.`cantidad`
    , `01_unidades`.`im_calculo`
    , `01_unidades`.`im_verbal`
    , `01_unidades`.`im_fisico`
    , `01_unidades`.`im_creativo`
FROM
    `cts_schoolwars`.`01_unidades`
    INNER JOIN `cts_schoolwars`.`01_unidades_user` 
        ON (`01_unidades`.`id` = `01_unidades_user`.`id_unidad`) WHERE id_escuela=$idamostrar;";

$resultado=mysqli_query($conexion,$sql);

while($fila=mysqli_fetch_array($resultado))
{
	$id=$fila["id_unidad"];
	$nomb=$fila["titulo"];
	$cant=$fila["cantidad"];
	$fisico=$fila["im_fisico"];
	$creativo=$fila["im_creativo"];
	$verbal=$fila["im_verbal"];
	$calculo=$fila["im_calculo"];
/*<td><input type="text" name="cant<?phpecho $nomb ?>"/>Tenes <?php echo $cant; ?></td> */	
?>
 

		<tr>
		  <td><?php echo $nomb;?><br> </td>
		  <input type="hidden" name="victima" value="<?php echo $id_victima ?>"/>
		  <td><input type="text" name="cant_alumnos[]"/>Tenes <?php echo $cant; ?><input type="hidden" value="<?php echo $id ?>"name="id_alumnos[]"/></td> 
		   <td> <span class="sm-st-icon st-red" style="width: 20px;height: 20px;font-size: 12px;line-height: 15px;"><i class="fa fa-male"></i></span><?php echo $fisico ;?><br>
	 <span class="sm-st-icon st-violet" style="width: 20px;height: 20px;font-size: 12px;line-height: 15px;"><i class="fa fa-eye"></i></span> <?php echo $creativo ;?><br>
	<span class="sm-st-icon st-blue" style="width: 20px;height: 20px;font-size: 12px;line-height: 15px;"><i class="fa fa-comment"></i></span> <?php echo $verbal ;?><br>
	<span class="sm-st-icon st-green" style="width: 20px;height: 20px;font-size: 12px;line-height: 15px;"><i class="fa fa-eraser"></i></span> <?php echo $calculo ;?>  
		</td>
		  <td>
		  </td>
	  </tr>
	  
	 <?php
	 }
	 ?>
	 </tbody>
	 </table>
	 </form>