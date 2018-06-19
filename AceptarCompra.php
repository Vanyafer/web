<?php include "barra.php"; include"Conexion.php"; ?>
<?php
	$usuario = $_SESSION['id_usuario'];
	$consultaUsuario= mysqli_query($conexion, "select * from usuario where id_usuario=$usuario");
	$resultUsuario=mysqli_fetch_array($consultaUsuario);
	$correo = $resultUsuario['correo'];
	$nombusu = $resultUsuario['usuario'];
	$calle = $resultUsuario['calle'];
	$total = $_SESSION['total'];
	$cantidad = $_SESSION['cantidad'];

	$asunto="MooCouture";
		$j = 0;
		$fecha=date("Y-m-d");
		$mes = date("m");
		$dia = date("d");
		$ano = date("Y");

		 for ($i = 0; $i < 3 ; $i++) { 
		 	do{
		 		$day = date("w",mktime(0,0,0,$mes,($dia + $j),$ano));
		 		$j++;
		 	}while($day == 5 || $day == 6);
		 	
		 	$fecha3 = date("Y-m-d", mktime(0,0,0,$mes,($dia + $j),$ano));
		 }

 
	$var=explode(",",$_COOKIE["carrito"]);
    $cantidad_prod=count($var);
    $error=0;
    $valores= array_count_values($var);

    $ids=array_unique($var);

    $s= "INSERT INTO pedidos VALUES(NULL, $usuario, '$fecha', '$fecha3', $total, '$calle', $cantidad, 0)";

     if(mysqli_query($conexion,$s))
        {
        	$cons_t=mysqli_query($conexion,'SELECT * FROM pedidos ORDER BY id_pedido DESC LIMIT 1');
            $ti=mysqli_fetch_assoc($cons_t);
            $ticket=$ti["id_pedido"];
            $_SESSION["id_pedido"]=$ticket;
            foreach ($ids as $restar) {
                $cant=$valores[$restar];
                $b="SELECT * FROM producto WHERE prodid=".$restar;
                $busc_sql=mysqli_query($conexion,$b);
                if(mysqli_num_rows($busc_sql)==1)
                {
                    $prod=mysqli_fetch_assoc($busc_sql);
                    $total=$prod["stock"]-$cant;
                    $act="UPDATE producto SET stock = $total WHERE prodid = $restar";
                    mysqli_query($conexion,$act);
                }
                
            }
            setcookie("carrito","",time() + (10), "/");
            unset($_COOKIE["carrito"]);
        }

	$Todo= $nombusu.", su pedido ha sido enviado. Productos: ".$_SESSION['cantidad'].". Precio: ".$_SESSION['total'].". Su pedido fue solicitado el ".$fecha. " y será entregado dentro de tres días hábiles:".$fecha3.". Gracias!";

	if(mail($correo, $asunto, $Todo))
	{
		echo "<script>alert('Correo enviado al servidor');</script>";
	}
	else
	{
		echo "<script>alert('No se ha podido enviar el correo enviado al servidor');</script>";
	}
	header("Location: index.php");
?>