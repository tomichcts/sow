<?php
include("00_assets/config.php");
?>

                    <!-- Main row -->
                    <div class="row">

  <div class="col-md-6">

	<section class="panel">
	  <header class="panel-heading">
		  Clases
	</header>
	<div class="panel-body table-responsive">
		<table class="table table-hover" >
		  <thead>
			<tr>
			  <th>Fotito</th>
			  <th>Clase</th>
			  <th>Tipos de alumnos</th>
			  <th></th>
		  </tr>
	  </thead>
	  <tbody>
	
	<?php 
	  
	  $sql="SELECT `03_asignaturas`.* , `01_unidades`.`titulo` FROM `cts_schoolwars`.`01_unidades` INNER JOIN `cts_schoolwars`.`03_asignaturas` ON (`01_unidades`.`id_clase_requerida` = `03_asignaturas`.`id`);";
	  $resultado=mysqli_query($conexion,$sql);
	
		$ultimoid=0;
		$a=0;
	
	while($fila=mysqli_fetch_array($resultado)){
	
	$imagen = $fila['clase_imagen'];
	$nombre = $fila['clase_titulo'];
	$alumno = $fila['titulo'];
	$id = $fila['id'];
	
if($id != $ultimoid)
		{
			echo '
			<tr>
			<td><img src="img/clases/'.$imagen.'" height="80" width="80"></td>
			<td>"'.$nombre.'"</td>
			<td>';
			$ultimoid = $id;
		}
	
if ($id == $ultimoid)
		{
			echo '
			'.$alumno.' <br>';
			$a = $a+1;
		}
	
if ($a==3)
		{
			echo'
			</td>
			<td>
			<button type="button" id="'.$id.'" data-loading-text="Loading..." class="btn btn-primary btn-infoclase" autocomplete="off">
			Ver Clase
			</button>
			</td>
			</tr>';	
			$a=0;
		}

	}
	?>

  </tbody>
</table>
</div>

	</section>
 </div>			

               
<div id="infoasignatura">
<h1>Selecione una asignatura</h1>
</div>

					</div>

	 
        
		
		
		<!-- ./ModaLES!!! -->
		<div class="modal fade" id="myModalJuanCruz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        piolaaaaa
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>

<script>
  $('#myButtonNacho').on('click', function () {
   /// alert("hola");
	var btn = $(this).button('loading');
    // business logic...
  //  $btn.button('reset');
  });
  
  
  
$("#infoasignatura").on("click","#boton_construiralumnos",function(e){
	e.preventDefault();
	var datos=$("#form_construiralumnos").serialize();
	
	$.ajax({
		url:"clases/ajax_abm_clase.php",
		method:"post",
		type:"post",
		data: datos,
		success:function(resultado) {
			alert("hola");
			//$("#infoasignatura").html(resultado);
		}
			
	});
	
});

$("#myButtonNacho").click(function(){

	$('#myModalJuanCruz').modal('show');

});
  
  
  
  $('.btn-infoclase').on('click', function () {
	var id = $(this).attr("id");
	
	
	
	$.ajax({
		url:"clases/ajax_mostrar_clase.php",
		method:"post",
		type:"post",
		data:"id="+id,
		success:function(resultado) {
			$("#infoasignatura").html(resultado);
		}
			
	});
    // business logic...
  //  $btn.button('reset');
  });


</script>
