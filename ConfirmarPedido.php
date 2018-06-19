<?php
	include "conexion.php";
	$id = $_GET['id'];

	if ($consulta=mysqli_query($conexion, "UPDATE pedidos SET estado = 2 WHERE id_pedido = $id")){
		header("Location: Pedidos.php"); 
	}
	else{
		echo "error";
	}	
 ?>