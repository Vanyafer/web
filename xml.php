<?php 
session_start();
include 'Conexion.php';
$id= $_GET['id'];
$usuario = $_SESSION['id_usuario'];

$xml = new DomDocument('1.0', 'UTF-8');

$factura=$xml->createElement('factura');
$factura=$xml->appendChild($factura);

$fact="SELECT * FROM pedidos WHERE id_pedido = $id AND id_usuario = $usuario";
$sql_fact=mysqli_query($conexion,$fact);
$datos_fact=mysqli_fetch_assoc($sql_fact);

$fact2="SELECT * FROM usuario WHERE id_usuario = $usuario";
$sql_fact2=mysqli_query($conexion,$fact2);
$datos_fact2=mysqli_fetch_assoc($sql_fact2);

$nombre=$xml->createElement('nombre',$datos_fact2["nombre"]);
$nombre=$factura->appendChild($nombre);

$apellidos=$xml->createElement('apellidos',$datos_fact2["apellidop"]." ".$datos_fact2["apellidom"]);
$apellidos=$factura->appendChild($apellidos);

$id_pedido=$xml->createElement('id_pedido',$datos_fact["id_pedido"]);
$id_pedido=$factura->appendChild($id_pedido);

$calle=$xml->createElement('calle',$datos_fact2["calle"]);
$calle=$factura->appendChild($calle);

$numext=$xml->createElement('numext',$datos_fact2["numext"]);
$numext=$factura->appendChild($numext);

$numint=$xml->createElement('numint',$datos_fact2["numint"]);
$numint=$factura->appendChild($numint);

$colonia=$xml->createElement('colonia',$datos_fact2["colonia"]);
$colonia=$factura->appendChild($colonia);

$ciudad=$xml->createElement('ciudad',$datos_fact2["ciudad"]);
$ciudad=$factura->appendChild($ciudad);

$estado=$xml->createElement('estado',$datos_fact2["estado"]);
$estado=$factura->appendChild($estado);

$cp=$xml->createElement('cp',$datos_fact2["cp"]);
$cp=$factura->appendChild($cp);

$cantidad=$xml->createElement('cantidad',$datos_fact["cantidad"]);
$cantidad=$factura->appendChild($cantidad);

$total=$xml->createElement('total',$datos_fact["total"]);
$total=$factura->appendChild($total);

$fechapedido=$xml->createElement('fechapedido',$datos_fact["fechapedido"]);
$fechapedido=$factura->appendChild($fechapedido);

$fechaentrega=$xml->createElement('fechaentrega',$datos_fact["fechaentrega"]);
$fechaentrega=$factura->appendChild($fechaentrega);

$xml->formatOutput = true;
$xml->saveXML();
$xml->save('facturas/factura'.$id.'usuario'.$usuario.'.xml');

$filename = "facturas/factura".$id."usuario".$usuario.".xml";

$mysqlxml="UPDATE pedidos SET xml = '$filename' where id_usuario = $usuario AND id_pedido = $id";
$sql=mysqli_query($conexion,$mysqlxml);

setcookie("carrito","",time() + (10), "/");
unset($_COOKIE["carrito"]);

header("Location: index.php");

?>