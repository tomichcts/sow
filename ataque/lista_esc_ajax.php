<?php 
session_name("Sow2016");
session_start();
$idamostrar= $_SESSION['id_escuela'];

include("../00_assets/config.php"); ?>
<section class="panel">
	  <header class="panel-heading">
		  Escuelas <?php
foreach($_SESSION as $key => $valor)
{
echo $key ."-".$valor.'<br>';
}
 echo $idamostrar ?>
	</header>
	<div class="panel-body table-responsive">
		<table class="table table-hover">
		  <thead>
			<tr>
			  <th>Pop</th>
			  <th>Escuela</th>
			  <th>Foto</th>
			  <th>Estadisticas</th>
			  <th></th>
		  </tr>
	  </thead>
	  <tbody>
	
	
	
<?php


$sql="SELECT * FROM `cts_schoolwars`.`00_escuelas`";
$resultado=mysqli_query($conexion,$sql);

while($fila=mysqli_fetch_array($resultado))
{
	$pop=$fila["rec_popularidad"];
	$nomb=$fila["nombre"];
	$id=$fila["id_usuario"];
	if($id==$idamostrar)
	{
	?>
					<tr>
							  <td><?php echo $pop; ?> </td>
							  <td><?php echo $nomb; ?> </td>
							  <td> <img src="ivo.jpg" height="80" width="80"></td>
							  <td> </td>
							  <td>
							  
							  </td>
						  </tr>
	
	<?php	
	}
	else{
	?>
	
		<tr>
		  <td><?php echo $pop; ?> </td>
		  <td><?php echo $nomb; ?> </td>
		  <td> <img src="ivo.jpg" height="80" width="80"></td>
		  <td> </td>
		  <td>
		  
		  <button value="<?php echo$id;?>" type="button" class="btn btn-primary atack" data-toggle="modal" data-target="#myModal">
			Atacar
		   </button>
		  </td>
	  </tr>
<?php
}
}
?>	  
  </tbody>
</table>

	</section>
	