<?php
/*--------------------------------------------------------------
*
*	Funciones Compartidas del juego
*
*--------------------------------------------------------------*/
	
function calcularPrecio($nivel,$precio){
	$resultado = $precio*$nivel; // precio edificios
	return $resultado;
}

function calcularTiempo($nivel,$tiempo){
	$resultado=$tiempo*$nivel; // tiempo edificios
	return $resultado;
}

function MensajesDelJuego($id_msg){
 
	switch ($id_msg){
		// Los mensajes 9XX son generales del juego
		case 991: $msg="Se reseteo la cuenta correctamente"; break;
		case 999: $msg="No hagas Trampa!"; break;
		
		//Los mensajes 1XX  son de la seccion edificios
		case 101: $msg="Se esta construyendo correctamente"; break;
		case 102: $msg="No hay dinero suficiente"; break;
		case 103: $msg="ya te encuentras construyendo algo"; break;
		case 104: $msg="No cumplo requisitios minimos"; break;
		case 105: $msg="Felicidades, inauguraste un edificio nuevo."; break;
		case 106: $msg="Has desbloqueado nuevos edificios!"; break;
		
		default:
			$msg="sin Mensaje x ahora";
	}
	return $msg;
}

?>