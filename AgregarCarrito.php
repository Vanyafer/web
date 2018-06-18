<?php 
include("Conexion.php");
 $prod = $_POST['id'];
 $cant = $_POST['Cantidad'];

$cookie_name="carrito";


$auth=mysqli_query($conexion,"SELECT * FROM producto WHERE prodid=$prod");
if(mysqli_num_rows($auth)==1){
	if(!isset($_COOKIE["carrito"]))
	        {
	            $valor=$prod;
	            setcookie($cookie_name, $valor, time() + (86400), "/"); // 86400 = 1 day
	            $cant--;
	            $carrito=$valor;
	        }
	        else {
	            $carrito=$_COOKIE["carrito"];
	        }
	        
	        for ($i=0; $i <$cant ; $i++) { 
	            $carrito=$carrito.",".$prod;
	        }
	        unset($_COOKIE["carrito"]);
	        
	        setcookie($cookie_name, $carrito, time() + (86400), "/"); // 86400 = 1 day

	$stock = $result['stock']-$cantidad;
	header("location: producto.php?prodid=".$prod);
}
?>