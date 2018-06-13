<?php
	include("Conexion.php");
	$idCompra =$_POST['idp'];
	$consulta=mysqli_query($conexion, "select * from carrito where Id_carrito=$idCompra");
	$resultCompra=mysqli_fetch_array($consulta);
	$id = $resultCompra['prodid'];
	
	$consultaProducto=mysqli_query($conexion, "select * from producto where prodid=$id");
	$resultProducto=mysqli_fetch_array($consultaProducto);

 ?>
 <link rel="stylesheet" type="text/css" href="css/compra.css">
<div>
	<div class="box">
		<img src="<?php echo $resultProducto["imagen"]?>" class="imagencompra">
	</div>
	<div class="box">
	<form action="AceptarCompra.php" method="POST">
	<input type="hidden" id="idp" name="idp" value="<?php echo $resultCompra['id_carrito']; ?>">
	
		<div class="Nombre"><?php echo $resultProducto['nombre']?></div>
		<div class="Descripcion">Descripcion: <?php echo $resultProducto['descripcion']?></div>
		<div class="Precio">Precio: $<?php echo $resultProducto['precio']?> MXN</div>
		<div> Cantidad: <?php echo $resultCompra['cantidad']?></div>
			<input type="submit" name="Aceptar" value="Aceptar" class="Comprar">
		
	</form>
	</div>
</div>
		