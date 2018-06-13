<html>
<head>
	<title>Carrito</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/carrito.css">
   <script src="js/jquery.min.js"></script>
   <script type="text/javascript">
	$(document).ready(function(){
	    $(".Close").click(function(){
	        $(".overlay").fadeOut(400);
	    });
	    $(".Abrir").click(function(){
	        id=$(this).attr("id");

		    	$("#idp").val(id);
		    	$.ajax({

		    		url:'Comprar.php',
		    		method:'POST',
		    		data: $("#idp").serialize(),
		    		 success: function(res){
		    		 	$(".Com").html(res);
		    		 }	
		    		});
		        $(".overlay").fadeIn(400);
	    });
});
</script>
</head>
<body>

<?php include "barra.php"; include("Conexion.php"); ?>
<div class="Lista">
	<?php
	$usuario = $_SESSION['id_usuario'];
			$consulta1 = mysqli_query($conexion,"SELECT * FROM carrito where id_usuario=$usuario ");//where id_usuario=$_SESSION['usuario'];");
			
			echo '<table>
          		<tr>
            <td class="cinta">Nombre de articulo</td>
            <td class="cinta">Cantidad</td>
            <td class="cinta">Precio</td>
            <td class="cinta">Total</td>
            <td class="cinta"></td>
          </tr>
          ';
          while ($result1 = mysqli_fetch_array($consulta1)) {
          		$id = $result1['prodid']; 
         		 $consultaProducto= mysqli_query($conexion, "select * from producto where prodid=$id");
         		 $resultProducto = mysqli_fetch_array($consultaProducto);
          		echo "<tr>";
            	echo'<td >';	
               		echo $resultProducto['nombre'];
            	echo "</td>";
           		echo '<td >';
           			echo $result1['cantidad'];
            	echo "</td>";
              echo '<td >';
                  echo $result1['precio'];
              echo "</td>";
              echo '<td >';
                  echo $result1['precio']*$result1['cantidad'];
              echo "</td>";
              echo '<td >';
                  echo "<a class='Abrir' id=".$result1['id_carrito'].">Comprar</a>";
              echo "</td>";
        	echo "</tr>";
          } 
          echo "</table>";
		?>
</div>
</body>
<div class="overlay">
	<input type="hidden" id="idp" name="idp">
	<div class="popup">
		<div class="Pop">
				<h1>Comprar <samp class="Close">x</samp></h1>
				<fieldset >
				<div class="Com">
					
				</div>
				</fieldset>
		</div>
	</div>	
</div>
</html>