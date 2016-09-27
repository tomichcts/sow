<?php

	include("../00_assets/config.php"); 
 
 
 
	if ( isset($_POST["id"])  ){
		$id = $_POST["id"];
		
		
		
	$sql="SELECT `03_asignaturas`.*,  `01_unidades`.`im_creativo`, `01_unidades`.`im_fisico`, `01_unidades`.`im_verbal`, `01_unidades`.`im_calculo`, `01_unidades`.`req_tiempo`, `01_unidades`.`req_popularidad`,`01_unidades`.`titulo`, `01_unidades`.`id` as `id_alu`, `01_unidades`.`imagen` FROM `cts_schoolwars`.`01_unidades` INNER JOIN `cts_schoolwars`.`03_asignaturas` ON (`01_unidades`.`id_clase_requerida` = `03_asignaturas`.`id`) WHERE `03_asignaturas`.id=$id;";
	  //echo $sql;
	  
	  $resultado=mysqli_query($conexion,$sql);
	
		$ultimoid=0;
		$a=0;
		$A_alumnos= array();
		$A_ids= array();
		$A_img= array();
		$A_claseimg= array();
		$A_id_alu= array();
		$A_creativo= array();
		$A_fisico= array();
		$A_verbal= array();
		$A_calculo= array();
		$A_tiempo= array();
		$A_popularidad= array();
		
		while($fila=mysqli_fetch_array($resultado)){
			$titulo= $fila['clase_titulo'];
			$descripcion = $fila['clase_descripcion'];
			$imagen = $fila['imagen'];
			$alumno = $fila['titulo'];
			$id = $fila['id'];
			$claseimg = $fila['clase_imagen'];
			$id_alu= $fila['id_alu'];
			$creativo= $fila['im_creativo'];
			$fisico= $fila['im_fisico'];
			$verbal= $fila['im_verbal'];
			$calculo= $fila['im_calculo'];
			$tiempo= $fila['req_tiempo'];
			$popularidad= $fila['req_popularidad'];
			
			array_push($A_alumnos, $alumno);
			array_push($A_ids, $id);
			array_push($A_img, $imagen);
			array_push($A_id_alu, $id_alu);
		}
	}
?>
 
 
 <div class="col-md-6">
  	<section class="panel">
	  <header class="panel-heading">
		  Espesificaciones
	  </header>
	  <br>
	<div class="row">
	<div class="col-md-12">
		<div class="col-md-4">
			<img src="img/clases/<?php echo $claseimg; ?>" height="100" width="100" style="margin-left: 30px;">
		</div>
		<div class="col-md-4">
			<b>Burros:</b>
			<br>
			5
		</div>
		<div class="col-md-4">
			<b><?php echo $titulo; ?></b>
			<br>
			<?php echo $descripcion; ?>
		</div>
		
	</div>	
	</div>
	
	<div class="panel-body table-responsive">
	<br><br><br><br>
	<form id="form_construiralumnos">
		<table class="table table-hover" style="margin-top: 30px">
		  <thead>
			<tr>
			  <th>Fotito</th>
			  <th>Alumnos</th>
			  <th>Requiere</th>
			  <th></th>
		  </tr>
	  </thead>
	  <tbody>
	  <?php
	  $cantidad= count($A_alumnos);
	  
	  for($i=0; $i<$cantidad; $i++){
	  ?>
		<tr>
		  <td><img src="img/alumnos/<?php echo $A_img[$i]; ?>" height="20%"></td>
		  <td><?php echo $A_alumnos[$i]; ?></td>
		  <td>
		  
		  <table>
		  <tr>
		  <img src="img/recursos/popu.png"height="30px" width="30px" style="margin-bottom: 10px">100<br>
		  <img src="img/recursos/matri.png"height="30px" width="30px" style="margin-bottom: 10px">0<br>    
		  <img src="img/recursos/imCa.png"height="30px" width="30px" style="margin-bottom: 10px">100 <br>
		  <img src="img/recursos/imF.png"height="30px" width="30px" style="margin-bottom: 10px">0<br>
		  <img src="img/recursos/imC.png"height="30px" width="30px" style="margin-bottom: 10px">1000
		 
		  </tr>
		  </table>
		  
		  
		  </td>
		  <td>
		  <input name="alumnos[]" type="text" style="width: 80px">
		  <input name="id_alumnos[]" value="<?php echo $A_id_alu[$i]; ?>" type="hidden" style="width: 80px">
		  </td>
	  </tr>
	  <?php
	  }
	  ?>
	 
  </tbody>
</table>

<button id="boton_construiralumnos" class="btn btn-primary btn-infoclase" >
			construir
</button>

</form>
</div>
	</section>
  
  
 </div>	 
 
