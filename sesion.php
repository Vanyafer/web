<?php
	include("Conexion.php");
	include("barra.php");
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/contacto.css">
</head>
<body>
	<div id="Formulario">
		<form action="sesion.php" method="POST">
			<h1>Iniciar Sesión</h1>
			<p>Usuario</p>
			<input type="text" name="Usuario" id="Usuario" value="" onBlur="if(this.value=='')this.value='Uusario'" onFocus="if(this.value=='Usuario')this.value='' ">
			<p>Contraseña</p>
			<input type="password" name="Password" value="" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "> 
			<p></p>
			<input type="submit" value="Aceptar">
		</form>
	</div>
</body>
</html>

<?php 
if(isset($_SESSION['Usuario']))header("Location: Index.php");
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$Usu=mysqli_real_escape_string($conexion, $_POST['Usuario']);
		$Contra=mysqli_real_escape_string($conexion, $_POST['Password']);
		$auth=mysqli_query($conexion,"SELECT * FROM usuario WHERE usuario ='$Usu' and contra='$Contra'");

		if(mysqli_num_rows($auth)==1){
			$result=mysqli_fetch_array($auth);
			$_SESSION['nombre']=$result['nombre'];
			$_SESSION['ApellidoP']=$result['ApellidoP'];
			$_SESSION['ApellidoM']=$result['ApellidoM'];
			$_SESSION['correo']=$result['correo'];
			$_SESSION['usuario']=$Usu;
			$_SESSION['contra']=$Contra;
			$_SESSION['calle']=$result['calle'];
			$_SESSION['NumInt']=$result['NumInt'];
			$_SESSION['NumExt']=$result['NumExt'];
			$_SESSION['colonia']=$result['colonia'];
			$_SESSION['ciudad']=$result['ciudad'];
			$_SESSION['estado']=$result['estado'];
			$_SESSION['cp']=$result['cp'];

			header("Location: Index.php");
		}else{
		}
	}
	mysqli_close($conexion);
?>