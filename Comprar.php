<?php include "barra.php"; include("Conexion.php"); ?>

<?php
	$usu = $_SESSION['id_usuario'];
	$consulta=mysqli_query($conexion, "select * from usuario where id_usuario = $usu");
	$resultCompra=mysqli_fetch_array($consulta);

	$calle = $resultCompra['calle'];
	$numext = $resultCompra['numext'];
	$numint = $resultCompra['numint'];
	$colonia = $resultCompra['colonia'];
	$ciudad = $resultCompra['ciudad'];
	$estado = $resultCompra['estado'];
	$cp = $resultCompra['cp'];

 ?>
 <link rel="stylesheet" type="text/css" href="css/compra.css">
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="css/carrito.css">
 </head>
 <body>
 	<table>
		<tr>
		<th class="cinta"><h1><b>Dirección de envio</b></h1></th>
		</tr>

		<tr>
			<th class="cinta"><h2><b>Calle</b></h2></th>
			<th class="cinta"><h2><b>No. Ext</b></h2></th>
			<th class="cinta"><h2><b>No. Int</b></h2></th>
			<th class="cinta"><h2><b>Colonia</b></h2></th>
			<th class="cinta"><h2><b>Ciudad</b></h2></th>
		    <th class="cinta"><h2><b>Estado</b></h2></th>
		    <th class="cinta"><h2><b>C.P.</b></h2></th>
		</tr>
		<?php
		            echo '<td><h4><b>'.$calle.'</h4></b></td>';
		            echo '<td># '.$numext.'</td>';
		            echo '<td># '.$numint.'</td>';
		            echo '<td>'.$colonia.'</td>';
		            echo '<td>'.$ciudad.'</td>';
		            echo '<td>'.$estado.'</td>';
		            echo '<td>'.$cp.'</td>';
		            echo '</tr>';
    
		?>
		<tr><th></th>
		</tr>

			
		<tr><th><a href="AceptarCompra.php">Comprar</th></tr>


	</table>
 </body>
 </html>


