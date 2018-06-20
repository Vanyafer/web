<?php
include 'Conexion.php';
require('fpdf/fpdf.php');

function burbuja($array)

{

    for($i=1;$i<count($array);$i++)

    {
        for($j=0;$j<count($array)-$i;$j++)
        {
            if($array[$j]>$array[$j+1])
            {
                $k=$array[$j+1];
                $array[$j+1]=$array[$j];
                $array[$j]=$k;
            }
        }
    }
    return $array;
}
class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Logo
    $this->Image("./img/nombre.jpg" , 10 ,8, 35 , 38 , "JPG" ,"http://www.mipagina.com");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(80);
    //Título
    $this->Cell(60,10,'NE PATRIOTS STORE',1,0,'C');
    //Salto de línea
    $this->Ln(20);
      
   }
   
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   function add_table($act,$label)
	{
    // Arial 12
    $this->SetFont('Arial','',12);
    // Color de fondo
    $this->SetDrawColor(0,0,0);
    $this->SetFillColor(157,210,244);
    $this->SetTextColor(0,0,0);
    // Título
    $this->Cell(0,10,utf8_decode($act.$label),0,1, 'L', true);
    // Salto de línea
	}
	function datos($act,$label)
	{
    // Arial 12
    $this->SetFont('Arial','',15);
    // Color de fondo
    $this->SetDrawColor(0,0,0);
    $this->SetFillColor(255,255,255);
    $this->SetTextColor(0,0,0);
    // Título
    $this->Cell(0,10,utf8_decode($act.$label),0,1, 'L', true);
    // Salto de línea
	}
	function titulos($label)
	{
    // Arial 12
    $this->SetFont('Arial','',20);
    // Color de fondo
    $this->SetDrawColor(0,0,0);
    $this->SetFillColor(255,255,255);
    $this->SetTextColor(0,0,0);
    // Título
    $this->Cell(0,10,utf8_decode($label),0,1, 'L', true);
    // Salto de línea
	}

  
   
}

$pdf=new PDF();
//Títulos de las columnas
$header=array('Cantidad','Producto','Precio');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(65);
//$pdf->AddPage();

//Segunda página




?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>MoooCouture</title>
	=
	<style type="text/css">
		body
{
	background:url("imgs/estadio.jpg"); 
	background-repeat: repeat-y; 
	background-position: center ;
}
	</style>
</head>
<script type="text/javascript">
	function confirmar()
	{
		
		var r = confirm("¿Esta seguro que desea continuar con su compra?");
		if(r==true)
		{
			{window.location="select_dir_envio.php"}
		}

	}
</script>
<header>
<?php 
	if(isset($_SESSION['usuario'])&&$_SESSION['usuario']=='admin')
	{
		echo '<script>{window.location="index.php"}</script>';
	}
	else if(isset($_SESSION['usuario']))
	{
		include 'barra.php';
	}
    else
    {
	    echo '<script>{window.location="index.php"}</script>';
    }
?>
</header>
<body>
	
	
	<div class="container">
	<div class="panel panel-primary" width="100%" height="100%">
	
		<div class="table-responsive">
			<table class="table">
				<tr class="info">
					<th style="text-align: center;"><h2><b>Cantidad</b></h2></th>
					<th style="text-align: center;"><h2><b>Producto</b></h2></th>
					<th style="text-align: center;"><h2><b>Sexo</b></h2></th>
					<th style="text-align: center;"><h2><b>Precio</b></h2></th>
					<th style="text-align: center;"><h2><b>Imagen</b></h2></th>
				</tr>
				<?php
                $sql_venta="SELECT * FROM pedido,usuario WHERE pediodo.id_usuario = usuario.id_usuario and pediodo.id_pedido = ";
				$ver_venta=mysqli_query($connect,$sql_venta);
				//echo $sql_venta;
                if(mysqli_num_rows($ver_venta)==1)
                {
                    $venta=mysqli_fetch_assoc($ver_venta);
                    $var=explode(",",$venta["carro"]);
                    $carro=burbuja($var);
                
				$valores= array_count_values($var);
				$ids=array_unique($var);
				$tarj=substr($venta["numero_tarj"],-4);

				
				
				$xml = new DomDocument('1.0', 'UTF-8');

					$factura=$xml->createElement('factura');
					$factura=$xml->appendChild($factura);


					$pdf->titulos("Factura #".$_SESSION["ticket"]);
					$pdf->Ln();
					$pdf->datos("Nombres: ",$venta["nombre"]);
					$pdf->datos("Apellidos: ",$venta["apellidop"]." ".$venta["apellidom"]);
					
					$pdf->Ln();
					$pdf->titulos("Dirección");
					$pdf->datos("Calle: ",$venta["calle"]);
					$pdf->datos("# Exterior: ",$venta["numext"]);
					$pdf->datos("# Interior: ",$venta["numint"]);
					$pdf->datos("Colonia: ",$venta["colonia"]);
					$pdf->datos("Ciudad: ",$venta["ciudad"]);
					$pdf->datos("Estado: ",$venta["estado"]);
					$pdf->datos("C.P. ",$venta["cp"]);
					$pdf->Ln();
					$pdf->titulos("Ticket #".$_SESSION["ticket"]);// guardar id de pedido
					$pdf->datos("Cantidad Articulos Vendidos: ",$venta["cantidad"]);
					$pdf->datos("Total: $",number_format($venta["total"]));
					$pdf->AliasNbPages();
					//Primera página
					$pdf->AddPage();
					$pdf->SetY(65);
					//$pdf->Ln();




					$nombres=$xml->createElement('nombres',$venta["nombres"]);
					$nombres=$factura->appendChild($nombres);

					$apellidos=$xml->createElement('apellidos',$venta["ap_paterno"]." ".$venta["ap_materno"]);
					$apellidos=$factura->appendChild($apellidos);

					$rfc=$xml->createElement('rfc',$venta["rfc"]);
					$rfc=$factura->appendChild($rfc);	

					$direccion=$xml->createElement('direccion');
					$direccion=$factura->appendChild($direccion);

					$calle=$xml->createElement('calle',$venta["calle"]);
					$calle=$direccion->appendChild($calle);

					$ext=$xml->createElement('exterior',$venta["n_ext"]);
					$ext=$direccion->appendChild($ext);

					$int=$xml->createElement('interior',$venta["n_int"]);
					$int=$direccion->appendChild($int);

					$colonia=$xml->createElement('colonia',$venta["colonia"]);
					$colonia=$direccion->appendChild($ext);

					$ciudad=$xml->createElement('ciudad',$venta["ciudad"]);
					$ciudad=$direccion->appendChild($ciudad);

					$estado=$xml->createElement('estado',$venta["estado"]);
					$estado=$direccion->appendChild($estado);

					$cp=$xml->createElement('cp',$venta["cp"]);
					$cp=$direccion->appendChild($cp);
					
					$razon=$xml->createElement('razon_social',$venta["razon_social"]);
					$razon=$factura->appendChild($razon);

					if ($venta["tipo"]=="F") {
						$persona=$xml->createElement('persona',"fisica");
						$persona=$factura->appendChild($persona);
					}
					elseif ($venta["tipo"]=="M") {
						$persona=$xml->createElement('persona',"moral");
						$persona=$factura->appendChild($persona);
					}

					$ticket=$xml->createElement('ticket',$_SESSION["ticket"]);
					$ticket=$factura->appendChild($ticket);
					$articulos=$xml->createElement('articulos',$venta["art"]);
					$articulos=$factura->appendChild($articulos);
					$productos=$xml->createElement('productos');
					$productos=$factura->appendChild($productos);
					

				?>
					<h2><strong>Ticket:</strong> # <?php echo $venta["ticket"] ?></h2>
					<h4><strong>Comprador:</strong> <?php echo $venta["nombres"]." ".$venta["ap_paterno"]." ".$venta["ap_materno"] ?></h4>
					<h4><strong>Tarjeta:</strong> <?php echo "************".$tarj ?></h4><br>
					
					<h3><strong>Envio</strong></h3>
					<h4><strong>Fecha entrega:</strong> <?php echo $venta["fecha_entrega"] ?></h4><br>
					<h4><strong>Dirección:</strong> <?php echo $venta["calle"]." Ext.".$venta["n_ext"]."Int.".$venta["n_int"]."," ?></h4>
					<h4><?php echo $venta["colonia"].", ".$venta["ciudad"].", ".$venta["estado"].", C.P.".$venta["cp"] ?></h4><br>

				<?php
				$contador=0;
				foreach ($ids as $product) {
					$s='SELECT  productos.id, productos.nombre, productos.precio, productos.descripcion, productos.existencia, productos.imagen, sexo.nombre as sexo, productos.marca FROM productos, sexo WHERE sexo.id_sexo=productos.sexo AND productos.id='.$product;
				   $sql=mysqli_query($connect,$s);
				   
				   if(mysqli_num_rows($sql)==1)
                    {
						$prod=mysqli_fetch_assoc($sql);
						if($valores[$product]>$prod["existencia"])
						{
							echo '<tr class="danger">';
							$error=1;
						}
						else
						{
							echo '<tr class="active">';
						}
						
						echo '<td style="text-align: center;  vertical-align: middle;">'.$valores[$product].'</td>';
                        echo '<td style="text-align: center;  vertical-align: middle;"><b>'.$prod['marca'].'</b><br>'.$prod['nombre'].'</td>';
                        echo '<td style="text-align: center;  vertical-align: middle;">'.$prod['sexo'].'</td>';
                        echo '<td style="text-align: center;  vertical-align: middle;">$'.number_format($prod['precio']).'</td>';
                        echo '<td style="text-align: center;  vertical-align: middle;"><img src="'.$prod['imagen'].'"width="100px" ></td>';
					   
						$pdf->add_table("Cantidad de Articulos: #",$valores[$product]);
						$pdf->add_table("Producto: ",$prod["nombre"]);
						$pdf->add_table("Marca: ",$prod["marca"]);
						$pdf->add_table("Precio: $",number_format($prod["precio"]));
						$pdf->Ln();
						$contador++;
						if($contador>3)
						{
							$contador=0;
							$pdf->AliasNbPages();
							//Primera página
							$pdf->AddPage();
							$pdf->SetY(65);
						}
						

						$producto=$xml->createElement('producto');
						$producto=$productos->appendChild($producto);

						$nombre=$xml->createElement('nombre',$prod["nombre"]);
						$nombre=$producto->appendChild($nombre);

						$marca=$xml->createElement('marca',$prod["marca"]);
						$marca=$producto->appendChild($marca);

						$cant_prod=$xml->createElement('cantidad',$valores[$product]);
						$cant_prod=$producto->appendChild($cant_prod);

						$precio=$xml->createElement('precio',"$".number_format($prod["precio"]));
						$precio=$producto->appendChild($precio);
						
                    }
					echo '</tr>';


					#FACTURA XML
					

					
					
				 
					
				}
	?>
                <tr><th></th>
                </tr>
                <tr class="active">
                    <th colspan="1" style="text-align: center;  vertical-align: middle;"><h3><b>Cantidad:</b></h3></th>
                    <th colspan="1" style="text-align: center;  vertical-align: middle;"><h3><b><?php echo $venta["art"] ?></b></h3></th>
					<th colspan="2" style="text-align: center;  vertical-align: middle;"><h3><b>TOTAL:</b></h3></th>
                    <th colspan="2" style="text-align: center;  vertical-align: middle;"><h3><b>$<?php echo number_format($venta["total"]); ?></b></h3></th>
                </tr>
				<tr><th></th>
                </tr>               
				
	
			</table>
		</div>

		<?php

		

		$tot=$xml->createElement('total',"$".number_format($venta["total"]));
		$tot=$factura->appendChild($tot);
		$xml->formatOutput = true;
		$xml->saveXML();
		$xml->save('facturas/ticket_#'.$_SESSION["ticket"].'.xml');
		$el_xml = $xml->saveXML();
		
		$filename="facturas/ticket_#".$_SESSION["ticket"].".pdf";
		$pdf->Output($filename,'F');
		//echo htmlentities($el_xml);
		}
		?>

		
		</div>
		
	</div>
	
	


</body>
<footer>						
	
</footer>
</html>