<?php
	include("Conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Agregar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/contacto.css">
</head>
<body>
<?php include "barra.php"; ?>
<div id="Formulario">
	<form action="AgregarProducto.php" method="POST">
		<h1>Agregar un producto</h1>
		<p>Nombre</p>
		<input type="text" name="Nombre" id="Nombre" value="">
		<p>Descripcion</p>
		<input type="text" name="Descripcion" id="Descripcion" value="">
		<p>Stock</p>
		<input type="number" name="Stock" id="Stock" value="">
		<p>Precio en MXN</p>
		<input type="number" name="Precio" id="Precio" value="">
		<p>Precio en MXN</p>
		<input type="number" name="Descuento" id="Descuento" value="">
		<p>Imagen</p>
		<input type="file" name="image" id="image">
		<p>Tipo</p>
		<input type="number" name="Tipo" id="Tipo" value="">
		<p></p>
		<input type="submit" value="Aceptar">
	</form>
</div>

<?php include "footer.php"; ?>
</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$nombre=mysqli_real_escape_string($conexion, $_POST['Nombre']);
		$descripcion=mysqli_real_escape_string($conexion, $_POST['Descripcion']);
		$stock=mysqli_real_escape_string($conexion, $_POST['Stock']);
		$precio=mysqli_real_escape_string($conexion, $_POST['Precio']);
		$descuento=mysqli_real_escape_string($conexion, $_POST['Descuento']);
		$tipo=mysqli_real_escape_string($conexion, $_POST['Tipo']);

		$folder="img/";
		$tmp_name = $_FILES["image"]["tmp_name"];
		move_uploaded_file( $tmp_name,"$folder".$_FILES["image"]["name"]);
		$imagen = $folder.$_FILES["image"]["name"];


		if (mysqli_query($conexion, "INSERT into producto values (NULL, '$nombre', '$descripcion', $stock, $precio, '$imagen', $tipo)")) {
			header("Location: index.php");
		} else{
		echo "error:" ;
		}
	}
?>