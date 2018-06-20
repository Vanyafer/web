<?php
include 'Conexion.php';
	if(isset($_SESSION['Usuario']))
	{
		
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/registro.css">
  	<script src="js/jquery.min.js"></script>
</head>
<body>
	<?php include "barra.php"; ?>
	<div id="Formulario">
	<h1>Registro</h1>
	<form id="Registro" action="registro.php" method="POST">
	<div id="Primero">
		<p>Nombre(s)</p>
		<input type="text" name="Nombre" id="Nombre">
		<p>Apellido paterno</p>
		<input type="text" name="ApellidoP" id="ApellidoP">
		<p>Apellido materno</p>
		<input type="text" name="ApellidoM" id="ApellidoM">
		<p>Email</p>
		<input type="email" name="Correo" id="Correo">
		<p>Confirmar Email</p>
		<input type="email" name="Correo1" id="Correo1">
		<p>Usuario</p>
		<input type="text" name="Usuario" id="Usuario"> 
		<p>Contraseña</p>
		<input type="password" name="Contra" id="Contra">
		<p>Confirmar contraseña</p>
		<input type="password" name="Contra1" id="Contra1">
		<p></p>
		<button id="Siguiente">Siguiente</button>
	</div>

	<div id="Segundo">
		<p>Dirección</p>
		<p>Calle/Avenida</p>
		<input type="text" name="Calle" id="Calle">
		<p>Número Interior</p>
		<input type="number" name="NumInt" id="NumInt">
		<p>Número Exterior</p>
		<input type="number" name="NumExt" id="NumExt">
		<p>Colonia</p>
		<input type="text" name="Colonia" id="Colonia">
		<p>Ciudad/Municipio</p>
		<input type="text" name="Ciudad" id="Ciudad">
		<p>Estado</p>
		<input type="text" name="Estado" id="Estado">
		<p>Código postal</p>
		<input type="number" name="CP" id="CP">
		<p>Número de tarjeta de crédito</p>
		<input type="number" name="CC" id="CC">
		<p>CCV</p>
		<input type="number" name="CCV" id="CCV">
		<p>Fecha de expiración</p>
		<input type="text" name="Fecha" id="Fecha">
		<p></p>
		<input type="submit" name="Enviar" value="Enviar">
	</div>
	</div>
	</form>
	</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("button").click(function (e) {
				e.preventDefault();
    			var a = $('#Nombre').val();
				var b = $('#ApellidoP').val();
				var c = $('#ApellidoM').val();
				var d = $('#Correo').val();
				var e = $('#Usuario').val();
				var f = $('#Contra').val();
				var g = $('#Contra1').val();
				var h = $('#Correo1').val();

    			if (a == "") {
    	    		alert("Por favor ingrese su nombre");
					return false;
				}
    			if (b == "") {
    	    		alert("Por favor ingrese su apellido paterno");
					return false;
				}
    			if (c == "") {
    	   			alert("Por favor ingrese su apellido materno");
					return false;
				}
    			if (d == "") {
        			alert("Por favor ingrese su email");
					return false;
				}					
				if (e == "") {
	    			alert("Por favor ingrese su nombre de usuario");
					return false;
				}			
				if (f == "") {
	    			alert("Por favor ingrese una contraseña");
					return false;
				}
				if (f != g) {
	    			alert("Las contraseñas no coinciden");
					return false;
				}
				if (d != h) {
	    			alert("Los emails no coinciden");
					return false;
				}
				console.log("Todo salio bien");
				$('#Primero').slideUp();
				setTimeout(() => {
					$('#Segundo').slideDown();
				}, 300);
				return true;
			})
		});
</script>

<script type="text/javascript">
	function validateForm2(){
				var q = $('#Calle').val();
				var j = $('#NumInt').val();
				var k = $('#NumExt').val();
				var l = $('#Colonia').val();
				var m = $('#Ciudad').val();
				var n = $('#Estado').val();
				var o = $('#CP').val();
				var r = $('#CC').val();
				var s = $('#CCV').val();
				var t = $('#Fecha').val();

				var cifra = null;
				var cifra_cad = null;
				var suma = 0;
				for (var i=0; i < r.length; i+=2){
					cifra = parseInt(r.charAt(i))*2;
					if (cifra > 9){ 
						cifra_cad = cifra.toString();
						cifra = parseInt(cifra_cad.charAt(0)) + 
					parseInt(cifra_cad.charAt(1));
					}
					suma+=cifra;
				}
				for (var i=1; i < r.length; i+=2){
					suma += parseInt(r.charAt(i));
				}


				if((suma % 10) != 0){
					alert("El número de tarjeta no es válido");
					return false;
				}

    			if (q == "") {
    	    		alert("Por favor ingrese su calle");
					return false;
				}
    			if (j == "") {
    	    		alert("Por favor ingrese su número interior");
					return false;
				}
    			if (k == "") {
    	   			alert("Por favor ingrese su número exterior");
					return false;
				}
    			if (l == "") {
        			alert("Por favor ingrese su colonia");
					return false;
				}					
				if (m == "") {
	    			alert("Por favor ingrese su ciudad");
					return false;
				}			
				if (n == "") {
	    			alert("Por favor ingrese su estado");
					return false;
				}
				if (o == "") {
	    			alert("Por favor ingrese su código postal");
					return false;
				}
				if (r == "") {
	    			alert("Por favor ingrese un número de tarjeta de crédito");
					return false;
				}
				if (s == "") {
	    			alert("Por favor ingrese su CCV");
					return false;
				}
				if (s.length >3 || s.length <3) {
	    			alert("CCV inválido");
					return false;
				}
				if (t == "") {
	    			alert("Por favor ingrese la fecha de expiración");
					return false;
				}
				
				return true;
	}

		$("[name=Enviar]").click(function(e){
			if(validateForm2() == true){
				$('#Segundo').slideUp();
				setTimeout(() => {
					$('#Tercero').slideDown();
				}, 300);
			}else{
				e.preventDefault();
			}
		})
</script>

</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$nombre=mysqli_real_escape_string($conexion, $_POST['Nombre']);
		$apellidop=mysqli_real_escape_string($conexion, $_POST['ApellidoP']);
		$apellidom=mysqli_real_escape_string($conexion, $_POST['ApellidoM']);
		$correo=mysqli_real_escape_string($conexion, $_POST['Correo']);
		$usuario=mysqli_real_escape_string($conexion, $_POST['Usuario']);
		$contra=mysqli_real_escape_string($conexion, $_POST['Contra']);
		$calle=mysqli_real_escape_string($conexion, $_POST['Calle']);
		$numint=mysqli_real_escape_string($conexion, $_POST['NumInt']);
		$numext=mysqli_real_escape_string($conexion, $_POST['NumExt']);
		$colonia=mysqli_real_escape_string($conexion, $_POST['Colonia']);
		$ciudad=mysqli_real_escape_string($conexion, $_POST['Ciudad']);
		$estado=mysqli_real_escape_string($conexion, $_POST['Estado']);
		$cp=mysqli_real_escape_string($conexion, $_POST['CP']);
		$cc=mysqli_real_escape_string($conexion, $_POST['CC']);
		$ccv=mysqli_real_escape_string($conexion, $_POST['CCV']);
		$fecha=mysqli_real_escape_string($conexion, $_POST['Fecha']);

		if (mysqli_query($conexion, "INSERT into usuario values (NULL, '$nombre', '$apellidop', '$apellidom', '$correo', '$usuario', '$contra', '$calle', '$numint', '$numext', '$colonia', '$ciudad', '$estado', '$cp', '$cc', '$ccv', '$fecha')")) {
			$_SESSION['Usuario'] = $_POST['Usuario'];
			header("Location: index.php");
		} else{
		echo "error:" ;
		}
	}
?>




