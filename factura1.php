<?php
session_start();
include 'Conexion.php';
require('fpdf/fpdf.php');
$id= $_GET['id'];
$usuario = $_SESSION['id_usuario'];
    class PDF extends \FPDF
{
    private $ww;
    private $y1;
    private $y2;

    function Header()
    {
        
        $title = "MooCouture";
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Calculamos ancho y posición del título.
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        // Colores de los bordes, fondo y texto
        $this->SetTextColor(0);
        // Ancho del borde (1 mm)
        $this->SetLineWidth(1);
        // Título
        $this->Cell($w,9,$title,0,0,'C',false);
        // Salto de línea
        $this->Ln(10);
    }
    
    function Footer()
    {
        // Posición a 1,5 cm del final
        $this->SetY(-15);
        // Arial itálica 8
        $this->SetFont('Arial','I',8);
        // Color del texto en gris
        $this->SetTextColor(128);
        // Número de página
        $this->Cell(0,10,iconv('UTF-8', 'windows-1252','Página ').$this->PageNo(),0,0,'C');
    }
    
    function BasicTable($header, $data)
    {
        // Cabecera
        foreach($header as $col)
        $this->Cell(50,8,$col,0);
        $this->Ln();
        // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
            $this->Cell(50,8,$col,0);
            $this->Ln();
        }
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
$pdf = new PDF();
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();

                $sql_venta="SELECT * FROM pedidos,usuario WHERE pedidos.id_usuario = usuario.id_usuario and pedidos.id_pedido =  $id and usuario.id_usuario = $usuario";
                $ver_venta=mysqli_query($conexion,$sql_venta);
                //echo $sql_venta;
                if(mysqli_num_rows($ver_venta)==1)
                {
                    $venta=mysqli_fetch_assoc($ver_venta);

                    $pdf->titulos("Factura #".$venta["id_pedido"]);
                    $pdf->Ln();
                    $pdf->datos("Nombre: ",$venta["nombre"]." ".$venta["apellidop"]." ".$venta["apellidom"]);
                    
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
                   // $pdf->titulos("Ticket #".$_SESSION["ticket"]);// guardar id de pedido

                    $header=array('Producto','Cantidad','Precio','Subtotal');
                    $productos = array();
                   /* foreach ($variable as $key => $value) {
                        $producto = array(); 
                        $producto[0] = 
                        $producto[1] =
                        $producto[2] =
                        $producto[3] =
                        $productos[] = $producto;
                    }*/
 
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
                        $consulta=mysqli_query($conexion,"SELECT * FROM descuentos WHERE cantidad=$cant_desc ORDER BY porcentaje");
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
                            $error=1;
                        }
                        $producto = array(); 
                        $producto[0] = $prod['nombre'];
                        $producto[1] = $valores[$product];
                        $producto[2] = $prod['precio'];
                        $subtotal+=($prod['precio']*$valores[$product]);
                        $producto[3] = $prod['precio']*$valores[$product];

                        $productos[] = $producto;
                        
                    }
                    if(isset($cant_desc))
                    {
                        $reba=ceil($subtotal*$aux_desc);
                    }
                
                    
                    $total=$subtotal-$reba;
                   $_SESSION["total"]=$total;
                   $_SESSION["cantidad"]=$cantidad_prod;
                 
                    
                }
                    $producto = array(); 
                    $producto[0] = "Cantidad total";
                    $producto[1] = $_SESSION["cantidad"];
                    $producto[2]  = "Subtotal";
                    $producto[3]  = number_format($subtotal);
                    $productos[] = $producto; 
              
                if($reba>0)
                {   $producto = array(); 
                    $producto[0] = "Descuento:";
                    $producto[1] = $descuento."%";
                    $producto[2] = "Rebajado:";
                    $producto[3] = number_format($reba);
                    $productos[] = $producto;

                }
                    $producto = array(); 
                    $producto[0] ="";
                    $producto[1] = "";
                    $producto[2] = "Total:";
                    $producto[3] = number_format($_SESSION["total"]) ;
                    $productos[] = $producto;



                       
                    $pdf->BasicTable($header,$productos);

                    $pdf->datos("Cantidad Articulos Vendidos: ",$venta["cantidad"]);
                    $pdf->datos("Total: $",number_format($venta["total"]));

                    $pdf->datos("Fecha de pedido: ",$venta["fechapedido"]);
                    $pdf->datos("Fecha de entrega: ",$venta["fechaentrega"]);
                    $pdf->AliasNbPages();
                    $filename="facturas/factura".$id."usuario".$usuario.".pdf";


                    $pdf->Output($filename,'F');
                    //setcookie("carrito","",time() + (10), "/");
            //unset($_COOKIE["carrito"]);

                    header("location: Index.php");
                }
?>
