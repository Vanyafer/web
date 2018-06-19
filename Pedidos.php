<?php include "barra.php"; include("Conexion.php"); ?>

<?php
	$consulta1=mysqli_query($conexion, "select * from pedidos order by id_pedido desc");

	echo '<table>
          		<tr>
            <td class="cinta">Pedido</td>
            <td class="cinta">Fecha solicitud</td>
            <td class="cinta">Fecha entrega</td>
            <td class="cinta">Estado</td>
            <td class="cinta">Confirmar entrega</td>
          </tr>
          ';

	while ($result1 = mysqli_fetch_array($consulta1)) {
		$id = $result1['id_pedido'];
		$consulta2=mysqli_query($conexion, "select * from pedidos where id_pedido=$id");
		$result2 = mysqli_fetch_array($consulta2);
		$estado = $result2['estado'];
		if ($result2['estado'] == 0 && $result2['fechaentrega'] < date("Y-m-d")){
			$estado = 1;
			$updatestado=mysqli_query($conexion,'UPDATE pedidos SET estado = 1 WHERE id_pedido = $id');
		}
		switch ($estado) {
			case '0':
				$estado2 = "Pendiente";
				break;
			case '1':
				$estado2 = "Retrasado";
				break;
			case '2':
				$estado2 = "Entregado";
				break;
		}
		echo "<tr>";
		echo "<td>".$id."</td>";
		echo "<td>".$result2['fechapedido']."</td>";
		echo "<td>".$result2['fechaentrega']."</td>";
		echo "<td>".$estado2."</td>";
		echo "<td><a href='ConfirmarPedido.php?id=$id'>Confirmar</a></td>";
		echo "</tr>";
	}
	echo "</table>";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/carrito.css">
</head>
<body>

</body>
</html>