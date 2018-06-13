<?php 
include("Conexion.php");
 $id = $_POST['id'];
 $cantidad = $_POST['Cantidad'];
 echo $id.$cantidad;
 $consulta=mysqli_query($conexion, "select * from producto where prodid=$id");
		$result=mysqli_fetch_array($consulta);
		$precio = $result['precio'];
session_start();
$usuario = $_SESSION['id_usuario'];
$consultaUsuario= mysqli_query($conexion, "select * from usuario where id_usuario=$usuario");
	$resultUsuario=mysqli_fetch_array($consultaUsuario);
	$usuario = $resultUsuario['id_usuario'];

mysqli_query($conexion,"INSERT into carrito values(NULL,$id,$precio,$cantidad,$usuario)");
$stock = $result['stock']-$cantidad;
header("location: producto.php?prodid=".$id);
?>