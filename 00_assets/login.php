<?php
session_name('Sow2016');
session_start();
require ("config.php");


//$sql="SELECT * FROM `00_usuarios` WHERE id='1'";

if (isSet($_POST['usu'])){

	$email= $_POST['usu'];
	$pass= $_POST['contra'];
	
	$usuario_sql = "SELECT * FROM `00_usuarios` WHERE email='$email' AND pass='$pass'";
	
	$usuario_query = mysqli_query($conexion, $usuario_sql);

	$resultados =mysqli_num_rows ($usuario_query);
	
	if($resultados==1){
		while ($fila=mysqli_fetch_array($usuario_query)){
		
			$_SESSION['id_usuario']=$fila['id'];
			$_SESSION['id_escuela']=$fila['id_escuela'];
			$_SESSION['usuario']=$fila['usuario'];
			
			$url="../index.php";
			
		}
	} else {
		$url="../login.php?e=1";
	}
	
	header("location: $url");
	
} else {
	$url="../login.php?e=2";
	header("location: $url");
}

?>