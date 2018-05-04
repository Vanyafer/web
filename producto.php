<?php
	include("Conexion.php");
	$consulta=mysqli_query($conexion, "select * from producto where prodid=$_GET[prodid]");
	$result=mysqli_fetch_array($consulta);
	$id = $result['prodid'];
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Producto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/producto.css">
</head>
<body>
<?php include "barra.php"; ?>
<div class="logo"><img src="img/nombre.png" ></div>
<div class="producto">
	<div class="box">
		<img src="<?php echo $result["imagen"]?>">
	</div>
	<div class="box">
	<form action="AgregarCarrito.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="Nombre"><?php echo $result['nombre']?></div>
		<div class="Descripcion">Descripcion: <?php echo $result['descripcion']?></div>
		<div class="Precio">Precio: $<?php echo $result['precio']?> MXN</div>
		<input type="number" name="Cantidad" max="<?php echo $result['stock']?>" value="0">
		<div>
			<input type="submit" name=""  class="Comprar">
		</div>
	</form>
		
	</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
<?php mysqli_close($conexion);?>