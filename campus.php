<?php 
include("00_assets/config.php");
?>
<div class="col-md-8">

	<section class="panel">
	  <header class="panel-heading">
		  Edificios
	</header>
	<div class="panel-body table-responsive">
		<table class="table table-hover">
		  <thead>
			<tr>
			  <th>Fotito</th>
			  <th>Coste</th>
			  <th></th>
		  </tr>
	  </thead>
	 
	  <tbody>
	  
	  <?php
$sql="SELECT * FROM `02_edificios`";
$resultado= mysqli_query($conexion, $sql);
	while($fila=mysqli_fetch_array($resultado)){
		$id=$fila['id'];
		$nombre=$fila['titulo'];
		$descripcion=$fila['descripcion'];
		$imagen=$fila['imagen'];
		$costo=$fila['req_dinero'];
		echo '<tr>
		  <td><img src="img/'.$imagen.'" width="150">'.$nombre.'</td>
		  <td>'.$costo.'</td>
		   <td></td>
		  <td> 
		  <button type="button" id="'.$id.'" data-loading-text="Loading..." class="btn btn-primary botonrojo btn-ver-edificio" autocomplete="off">
			Ver
		   </button>
		  </td>
		   </tr>' ;
	}
	
	
	
?>
	    
		
	 
  </tbody>
</table>

	</section>
                      
 </div>					  
	<div class="col-md-4">

	<div class="sm-st clearfix">
                                <div class="sm-st-info" id="infoedi">
								
                                </div>
                            </div>
</div>



<script>
  $('.btn-ver-edificio').on('click', function () {
    
	var id= $(this).attr("id");
	//alert("id= "+ id);
	
	mostrar_edificio(id);
	

  })
function mostrar_edificio(id){
	
	$.ajax({
			url: "campus/ajax_infoedi.php",
			method:"POST",
			type:"POST",
			data:"id="+id,
			success: function(resultado){
				$("#infoedi").html(resultado);
			}
	
		});
	
}

  $('#infoedi').on('click', '.btn_construir', function () {
    
	//var id_edi= $(this).attr("id_edi");
	var id_edi_general= $(this).attr("id_edi");
	//var nivel= $(this).attr("nivel");
	//var minutos= $(this).attr("minutos");
	$.ajax({
			url: "campus/abm_campus.php",
			method:"POST",
			type:"POST",
			//data:"id="+id_edi+'&nivel='+nivel,
			data:{
				id:id_edi_general
			
			},
			success: function(resultado){
				mostrar_edificio(id_edi_general);
				//$("#infoedi").html(resultado);
			}
	
		});
  })
</script>
