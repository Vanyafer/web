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
	<form enctype="multipart/form-data" action="AgregarProducto.php" method="POST">
		<h1>Agregar un producto:</h1>
		<table>
			<tr>
				<th colspan="1">Nombre: </th>
				<th colspan="3"> <input type="text" name="Nombre" id="Nombre" value=""></th>
			</tr>
			<tr>
				<th colspan="1">Descripcion:</th>
				<th colspan="3"><input type="text" name="Descripcion" id="Descripcion" value=""></th>
			</tr>
			<tr>
				<th colspan="1">Stock:</th>
				<th colspan="1"><input type="number" name="Stock" id="Stock" value="1" min="1"></th>
			
				<th colspan="1" class="precio"> Precio:</th>
				<th colspan="1"><input type="number" name="Precio" id="Precio"  value="1" min="1"></th>
			</tr>
			<tr>
				<th colspan="1">Imagen: </th>
				<th colspan="3"><input type="file" name="image" id="image"></th>
			</tr>
			<tr>
				<th colspan="1">Tipo:</th>
				<th colspan="3">
					<select name="Tipo" id="Tipo">
						<option value="1">Blusa</option>
						<option value="2">Vestido</option>
						<option value="3">Pantalon</option>
						<option value="4">Falda</option>
						<option value="5">Collar</option>
						<option value="6">Lentes</option>
						<option value="7">Bisuteria</option>
						<option value="8">Bolso</option>
					</select>
				</th>
			</tr>
		</table>
		
		
	
		
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