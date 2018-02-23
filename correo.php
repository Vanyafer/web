<?php
if(isset($_POST['Correo']))
{
	

	$nombre=$_POST['Nombre'];
	$correo=$_POST['Correo'];
	$telefono=$_POST['Telefono'];
	$mensaje=$_POST['Mensaje'];
	$asunto="MooCouture";
	$direccion="vanya9814@gmail.com";
	$Todo=$nombre." con telefono: ".$telefono." y correo: ".$correo." te ha enviado el siguiente mensaje: ".$mensaje;
	if(mail($direccion, $asunto, $Todo, "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com" ))
	{
		echo "<script>alert('Correo enviado al servidor');</script>";
		
	}
	else
	{
		echo "<script>alert('No se ha podido enviar el correo enviado al servidor');</script>";
	}
	
	
}
?>