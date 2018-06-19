<?php
	include("Conexion.php");
	$consulta1=mysqli_query($conexion, "select * from descuentos where id_descuento = 1");
	$result1=mysqli_fetch_array($consulta1);
	$consulta2=mysqli_query($conexion, "select * from descuentos where id_descuento = 2");
	$result2=mysqli_fetch_array($consulta2);
	$consulta3=mysqli_query($conexion, "select * from descuentos where id_descuento = 3");
	$result3=mysqli_fetch_array($consulta3);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Descuentos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/descuentos.css">
</head>
<body>
<?php include "barra.php"; ?>
<div id="Formulario">
	<form action="Descuentos.php" method="POST">
		<h1>Descuentos</h1>
		<table>
			<thead>
		    <tr>
		      <th>Cantidad</th>
		      <th>Descuento</th>
		    </tr>
		  </thead>
			<tr>
				<td><input type="number" name="Desc1" value="<?php echo $result1['cantidad']?>"></td>
				<td><input type="number" name="Desc2" value="<?php echo $result1['porcentaje']?>"></td>
			</tr>
			<tr>
				<td><input type="number" name="Desc3" value="<?php echo $result2['cantidad']?>"></td>
				<td><input type="number" name="Desc4" value="<?php echo $result2['porcentaje']?>"></td>
			</tr>
			<tr>
				<td><input type="number" name="Desc5" value="<?php echo $result3['cantidad']?>"></td>
				<td><input type="number" name="Desc6" value="<?php echo $result3['porcentaje']?>"></td>
			</tr>
		</table>
		<p></p>
		<input type="submit" value="Actualizar descuentos">
	</form>
</div>

<?php include "footer.php"; ?>
</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$desc1=mysqli_real_escape_string($conexion, $_POST['Desc1']);
		$desc2=mysqli_real_escape_string($conexion, $_POST['Desc2']);
		$desc3=mysqli_real_escape_string($conexion, $_POST['Desc3']);
		$desc4=mysqli_real_escape_string($conexion, $_POST['Desc4']);
		$desc5=mysqli_real_escape_string($conexion, $_POST['Desc5']);
		$desc6=mysqli_real_escape_string($conexion, $_POST['Desc6']);


		if ((mysqli_query($conexion, "UPDATE descuentos SET cantidad = $desc1, porcentaje = $desc2 WHERE id_descuento = 1")) && (mysqli_query($conexion, "UPDATE descuentos SET cantidad = $desc3, porcentaje = $desc4 WHERE id_descuento = 2")) && (mysqli_query($conexion, "UPDATE descuentos SET cantidad = $desc5, porcentaje = $desc6 WHERE id_descuento = 3")) ){
			header("Location: Descuentos.php");
		} else{
		echo "error:" ;
		}
	}
?>