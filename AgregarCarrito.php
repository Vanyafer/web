<?php 
include("Conexion.php");
 $id = $_POST['id'];
 $cantidad = $_POST['Cantidad'];
 echo $id.$cantidad;
 $consulta=mysqli_query($conexion, "select * from producto where prodid=$id");
		$result=mysqli_fetch_array($consulta);
		$precio = $result['precio'];
mysqli_query($conexion,"INSERT into carrito values(NULL,$id,$precio,$cantidad)");
$stock = $result['stock']-$cantidad;
mysqli_query($conexion,"UPDATE producto set stock=$stock where prodid = $id");

?>