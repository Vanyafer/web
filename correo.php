<?php
if(isset($_POST['Correo']))
{
	$nombre=$_POST['Nombre'];
	$correo=$_POST['Correo'];
	$telefono=$_POST['Telefono'];
	$mensaje=$_POST['Mensaje'];
	$asunto="MooCouture";
	$direccion="vanyafer9814@gmail.com";
	$Todo=$nombre." con telefono: ".$telefono." y correo: ".$correo." te ha enviado el siguiente mensaje: ".$mensaje;
	if(mail($direccion, $asunto, $Todo))
	{
		echo "<script>alert('Correo enviado al servidor');</script>";
	}
	else
	{
		echo "<script>alert('No se ha podido enviar el correo enviado al servidor');</script>";
	}
	header('Location: '.$_SERVER['REQUEST_URI']);
}
?>