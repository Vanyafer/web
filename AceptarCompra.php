<?php
include "Conexion.php";
session_start();

	$idCompra=$_POST['idp'];
	$consulta=mysqli_query($conexion, "select * from carrito where id_carrito = $idCompra");
	$resultCompra=mysqli_fetch_array($consulta);
	$id = $resultCompra['prodid'];
	
	$consultaProducto=mysqli_query($conexion, "select * from producto where prodid=$id");
	$resultProducto=mysqli_fetch_array($consultaProducto);

	$usuario = $_SESSION['id_usuario'];
	$consultaUsuario= mysqli_query($conexion, "select * from usuario where id_usuario=$usuario");
	$resultUsuario=mysqli_fetch_array($consultaUsuario);
	$correo = $resultUsuario['correo'];
	$nombusu = $resultUsuario['usuario'];
	$asunto="MooCouture";
		$j = 0;
		$dia = date("d");
		$mes = date("M");
		$ano = date("Y");
		 $fecha = $dia." ".$mes." ".$ano;
		 $mes = date("m");

		 for ($i = 0; $i < 3 ; $i++) { 
		 	do{
		 		$day = date("w",mktime(0,0,0,$mes,($dia + $j),$ano));
		 		$j++;
		 	}while($day == 5 || $day == 6);
		 	
		 	$fecha3 = date("d M Y", mktime(0,0,0,$mes,($dia + $j),$ano));
		 }
echo $fecha;
echo $fecha3;
	$Todo= $nombusu.", su pedido ha sido enviado. Pedido: ".$resultProducto['nombre'].". Precio: ".$resultProducto['precio'].". Cantidad: ".$resultCompra['cantidad'].". Precio total: ".$resultProducto['precio']*$resultCompra['cantidad'].". Su pedido fue solicitado el ".$fecha. " y será entregado dentro de tres días hábiles:".$fecha3.". Gracias!";
	if(mail($correo, $asunto, $Todo))
	{
		echo "<script>alert('Correo enviado al servidor');</script>";
	}
	else
	{
		echo "<script>alert('No se ha podido enviar el correo enviado al servidor');</script>";
	}
	header('Location: Carrito.php');
	
$stockfinal = $resultProducto['stock'] - $resultCompra['cantidad'];
mysqli_query($conexion,"UPDATE producto set stock=$stockfinal where prodid = $id");
$borrarcarro = $resultCompra['id_carrito']; 
mysqli_query($conexion,"DELETE FROM carrito WHERE id_carrito = $borrarcarro")
?>