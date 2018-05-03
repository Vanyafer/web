<?php
	include("Conexion.php");
	$consulta=mysqli_query($conexion, "select * from producto where prodid=$_GET[prodid]");
	$result=mysqli_fetch_array($consulta);
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
		<div class="Nombre"><?php echo $result['nombre']?></div>
		<div class="Descripcion">Descripcion: <?php echo $result['descripcion']?></div>
		<div class="Precio">Precio: $<?php echo $result['precio']?> MXN</div>
		<div class="Comprar"><a href="">Agregar al carrito</a></div>
	</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
<?php mysqli_close($conexion);?>