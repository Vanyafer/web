<?php include "barra.php"; include("Conexion.php"); ?>
<html>
<head>
	<title>Carrito</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/carrito.css">
   <script src="js/jquery.min.js"></script>
   <script type="text/javascript">
	$(document).ready(function(){
	    $(".Close").click(function(){
	        $(".overlay").fadeOut(400);
	    });
	    $(".Abrir").click(function(){
	        id=$(this).attr("id");

		    	$("#idp").val(id);
		    	$.ajax({

		    		url:'Comprar.php',
		    		method:'POST',
		    		data: $("#idp").serialize(),
		    		 success: function(res){
		    		 	$(".Com").html(res);
		    		 }	
		    		});
		        $(".overlay").fadeIn(400);
	    });
});
</script>
</head>
<body>

<?php
	if(isset($_COOKIE["carrito"]))
	{ 
?>

<div class="Lista">
	<?php
			echo '<table>
          		<tr>
            <td class="cinta">Nombre de articulo</td>
            <td class="cinta">Cantidad</td>
            <td class="cinta">Precio</td>
          </tr>
          ';

          	$error=0;
	        $subtotal=0;
	        $carrito=explode(",",$_COOKIE["carrito"]);
			$cantidad_prod=count($carrito);
			$descuento=0;
			$reba=0;
			$aux_desc=1;
			
			$sql_desc = mysqli_query($conexion,"SELECT * FROM descuentos");

			if(mysqli_num_rows($sql_desc)>0)
				{
					while($de=mysqli_fetch_assoc($sql_desc))
					{
						//echo '<script>alert("'.$de["cantidad"].'")</script>';
						if(!isset($cad))
						{
							$cad=$de["cantidad"];
							
						}
						else {
							$cad=$cad.",".$de["cantidad"];
						}
						
					}
					//echo '<script>alert("'.$cad.'")</script>';
					$descs=explode(",",$cad);
					$count_desc=count($descs);
					for ($i=0; $i <$count_desc ; $i++) { 
						if($cantidad_prod>=$descs[$i])
						{
							$cant_desc=$descs[$i];
						}
					}
					if(isset($cant_desc))
					{
						$consulta=mysqli_query($connect,"SELECT * FROM descuentos WHERE cantidad=$cant_desc ORDER BY porcentaje");
						if(mysqli_num_rows($consulta)>0)
						{
							while($ae=mysqli_fetch_assoc($consulta))
							{
								$descuento=$ae["porcentaje"];
							}
							
						}
						$aux_desc=$descuento/100;
					}

				}

				$valores= array_count_values($carrito);
				$ids=array_unique($carrito);

				foreach ($ids as $product) {
					$s='SELECT  producto.prodid, producto.nombre, producto.descripcion, producto.stock, producto.precio,  producto.imagen, producto.tipo FROM producto, tipos WHERE producto.tipo = tipos.id_tipo AND producto.prodid='.$product;
				   $sql=mysqli_query($conexion,$s);

				   if(mysqli_num_rows($sql)==1)
                    {
						$prod=mysqli_fetch_assoc($sql);
						if($valores[$product]>$prod["stock"])
						{
							echo '<tr>';
							$error=1;
						}
						else
						{
							echo '<tr >';
						}
						
						
                        echo '<td style="text-align: center;  vertical-align: middle;"><b>'.$prod['nombre'].'</td>';
                        echo '<td style="text-align: center;  vertical-align: middle;">'.$valores[$product].'</td>';
                        echo '<td style="text-align: center;  vertical-align: middle;">$'.$prod['precio'].'</td>';
						$subtotal+=($prod['precio']*$valores[$product]);
						
                    }
					echo '</tr>';
					if(isset($cant_desc))
					{
						$reba=ceil($subtotal*$aux_desc);
					}
				
					
					$total=$subtotal-$reba;
				   $_SESSION["total"]=$total;
				   $_SESSION["cantidad"]=$cantidad_prod;
				 
					
				}
	?>
	<tr><th></th>
                </tr>
                <tr>
                    <th colspan="1" style="text-align: center;  vertical-align: middle;"><h3><b>Cantidad:</b></h3></th>
                    <th colspan="1" style="text-align: center;  vertical-align: middle;"><h3><b><?php echo $_SESSION["cantidad"] ?></b></h3></th>
					<th colspan="2" style="text-align: center;  vertical-align: middle;"><h3><b>Subtotal:</b></h3></th>
                    <th colspan="2" style="text-align: center;  vertical-align: middle;"><h3><b>$<?php echo number_format($subtotal); ?></b></h3></th>
                </tr>
				<tr><th></th>
                </tr>
				<?php
				if($reba>0)
				{
				?>
                <tr>
                    <th colspan="1" style="text-align: center;  vertical-align: middle;"><h3><b>Descuento:</b></h3></th>
                    <th colspan="1" style="text-align: center;  vertical-align: middle;"><h3><b><?php echo $descuento ?>%</b></h3></th>
					<th colspan="2" style="text-align: center;  vertical-align: middle;"><h3><b>Rebajado:</b></h3></th>
                    <th colspan="2" style="text-align: center;  vertical-align: middle;"><h3><b>-$<?php echo number_format($reba) ?></b></h3></th>
				</tr>
				<?php
				}
				?>
				
				<tr><th></th>
                </tr>
                <tr>
                    <th colspan="3" style="text-align: center;  vertical-align: middle;"><h3><b>Total:</b></h3></th>
                    <th colspan="3" style="text-align: center;  vertical-align: middle;"><h3><b>$<?php echo number_format($_SESSION["total"]) ?></b></h3></th>
                </tr>
				<tr><th></th></tr>

				<?php
				if(!isset($_SESSION["usuario"]))
				{
					echo'<tr><th colspan="6"><div>
					<h4><strong>Inicia Sesión!</strong> Debes de iniciar sesión para poder comprar.</h4>
				  </div></th></tr>';
				}
				else
				{
					if($error!=0)
					{
						echo'<tr><th colspan="6"><div class="alert alert-danger">
					<h4>No hay suficientes artículos en stock.</h4>
				  </div></th></tr>';
						echo '<tr class="active"><th colspan="6"><button class="btn btn-lg btn-block" onclick="confirmar()" disabled> SIGUIENTE <i class="fas fa-arrow-right"></i></button></th></tr>';
					}
					else {
						echo '<tr><th colspan="6"><a class="Abrir">Comprar</th></tr>';
					}
					
				}
				?>

				</table>

	<?php
	}
	else
	{
		echo'<div align="center">';
		echo'<h1 align="center">El carrito se encuentra vacío</h1>';
		echo'</div>';
	}
	?>

</div>
</body>
<div class="overlay">
	<input type="hidden" id="idp" name="idp">
	<div class="popup">
		<div class="Pop">
				<h1>Comprar <samp class="Close">x</samp></h1>
				<fieldset >
				<div class="Com">
					
				</div>
				</fieldset>
		</div>
	</div>	
</div>
</html>