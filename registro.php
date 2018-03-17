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
	<form id="Registro" action="registro.php" onsubmit="return validateForm2()" method="POST">
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
		<input type="text" name="NumInt" id="NumInt">
		<p>Número Exterior</p>
		<input type="text" name="NumExt" id="NumExt">
		<p>Colonia</p>
		<input type="text" name="Colonia" id="Colonia">
		<p>Ciudad/Municipio</p>
		<input type="text" name="Ciudad" id="Ciudad">
		<p>Estado</p>
		<input type="text" name="Estado" id="Estado">
		<p>Código postal</p>
		<input type="text" name="CP" id="CP">
		<p></p>
		<input type="submit" name="Enviar" value="Enviar">
		<div id="Tercero">
		<h1>Gracias por registrarte</h1>
	</div>
	</div>
	</form>

	
	</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("button").click(function (e) {
			function validateForm() {
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
				else{
					return true;
				}
			}
			if (validateForm() == true){
			$('#Primero').slideUp();
			setTimeout(() => {
			$('#Segundo').slideDown();
			}, 300);
			}
		});
		
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
				else{
					return true;
				}
	}

	if (validateForm2() == true){
			$('#Segundo').slideUp();
			setTimeout(() => {
			$('#Tercero').slideDown();
			}, 300);
	}
</script>

</body>
</html>