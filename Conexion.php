<?php 
		$servidor="localhost";
		$usuario="root";
		$contra="";
		$BD="web1";
	$conexion=@mysqli_connect($servidor,$usuario,$contra);
	if(!$conexion){
		die('<strong>Error en la conexion</strong>'.mysqli_error());
	}
	mysqli_select_db($conexion, $BD)or die(mysqli_error($conexion));
 ?>