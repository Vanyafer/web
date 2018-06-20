<?php include "barra.php"; include("Conexion.php"); ?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/carrito.css">
</head>
<body>
	<?php
	$usu = $_SESSION['id_usuario'];
	$consulta1=mysqli_query($conexion, "select * from pedidos where id_usuario = $usu");

	echo '<br><br><table>

          		<thead>
          		<tr>
            <td class="cinta">Pedido</td>
            <td class="cinta">Cantidad</td>
            <td class="cinta">Total</td>
            <td class="cinta">PDF</td>
            <td class="cinta">XML</td>
          </tr>
          </thead>
          ';

	while ($result1 = mysqli_fetch_array($consulta1)) {
		$id = $result1['id_pedido'];
		$consulta2=mysqli_query($conexion, "select * from pedidos where id_pedido=$id");
		$result2 = mysqli_fetch_array($consulta2);
		$cantidad = $result2['cantidad'];
		$total = $result2['total'];
		$pdf = $result2['pdf'];
		$xml = $result2['xml'];
		echo "<tr>";
		echo "<td>#".$id."</td>";
		echo "<td>".$cantidad." productos</td>";
		echo "<td>$".$total.".00</td>";
		echo "<td><a href='".$pdf."' target='_blank'>Factura</a></td>";
		echo "<td><a href='".$xml."' target='_blank'>Factura</a></td>";
		echo "</tr>";
	}
	echo "</table>";
?>
</body>
</html>