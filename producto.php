<?php
	include("Conexion.php");
	$consulta=mysqli_query($conexion, "select * from producto where prodid=$_GET[prodid]");
	$result=mysqli_fetch_array($consulta);
	$id = $result['prodid'];
	$precio = $result['precio'];
	$stock = $result['stock'];
 ?>
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
	<form id="carrito" action="AgregarCarrito.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="Nombre"><?php echo $result['nombre']?></div>
		<div class="Descripcion">Descripcion: <?php echo $result['descripcion']?></div>
		<div class="Precio">Precio: $<?php echo $precio?> MXN</div>
		<div id="agregarcar">
			<div class="Cantidad">Cantidad<input type="number" name="Cantidad" max="<?php echo $result['stock']?>" min="1" value="1"></div>
			<input type="submit" name="Agregar al carrito" value="Agregar al carrito"  class="Comprar">
		</div>
		<div id="nostock">
			<div class="Nombre" color="red">Sin existencias.</div>
		</div>
	</form>
	<div id="cambiar">
	<form action="CambiarStock.php" method="POST">
		<p></p>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="Nombre"><?php echo $result['nombre']?></div>
		<div class="Descripcion">Descripcion: <?php echo $result['descripcion']?></div>
		<div class="Precio">Precio: $<?php echo $precio?> MXN</div>
		<div class="Stock">Agregar a stock: <?php echo $result['stock']?></div>
		<input type="number" name="Stock" id="Stock" min="<?php echo $stock?>" value="<?php echo $stock?>">
		<input type="submit" name="Cambiar" value="Cambiar" class="Comprar">

	</form>	
		
	</div>
	</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>


<?php
	if(!isset($_SESSION['id_usuario'])){
		if(!isset($_SESSION['id_admin'])){
        	echo "<script Language='JavaScript'>document.getElementById('cambiar').style.display='none';</script>";
    	}
    }
	if(isset($_SESSION['id_usuario'])){
        echo "<script Language='JavaScript'>document.getElementById('cambiar').style.display='none';</script>";
    }
    if(isset($_SESSION['id_admin'])){
        echo "<script Language='JavaScript'>document.getElementById('carrito').style.display='none';</script>";
    }
    if ($stock == 0){
    	echo "<script Language='JavaScript'>document.getElementById('agregarcar').style.display='none';</script>";
        echo "<script Language='JavaScript'>document.getElementById('nostock').style.visibility='visible';</script>";
    }
    if ($stock > 0){
    	echo "<script Language='JavaScript'>document.getElementById('nostock').style.display='none';</script>";
        echo "<script Language='JavaScript'>document.getElementById('agregarcar').style.visibility='visible';</script>";
    }
?>

<?php mysqli_close($conexion);?>


