<?php
	include("Conexion.php");
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = $_POST['id'];
		$stock=mysqli_real_escape_string($conexion, $_POST['Stock']);
		$descuento = mysqli_real_escape_string($conexion, $_POST['Descuento']);
		if (mysqli_query($conexion, "UPDATE producto SET stock = $stock WHERE prodid = $id")) {
			header("location: producto.php?prodid=".$id);
		} else{
		echo "error:" ;
		}

	}
?>