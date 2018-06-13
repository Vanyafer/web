<?php

include 'Conexion.php';
  $id = $_GET['id'];
    $consulta = mysqli_query($conexion,"SELECT * FROM tipos where id_tipo = $id");
    $result = mysqli_fetch_array($consulta);
?>
<!DOCTYPE html>
<html >
<head>
      <title>MooCouture</title>
      
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="css/productos.css">
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
              $(".imagen").click(function(){
                a=$(this).attr("id");
                window.location.href="./producto.php?prodid="+a;
              });
          });
        </script>
    </head>
    <body  >
    <?php include "barra.php"; ?>
<h1><?php echo $result['tipo']; ?></h1>
<div class="galeria">
<?php 
$con = 8;
  $consulta = mysqli_query($conexion,"SELECT * FROM producto where tipo = $id");

                      while ($result1 = mysqli_fetch_array($consulta)) {
                        
                        echo "  <div class='articulo'>
  <div class='imagen' id=".$result1['prodid'].">
      <img src=".$result1['imagen'].">
      <div class='desc'><p>".$result1['nombre']."</p><p>".$result1['precio']."$</p></div>

  </div>
</div>";
                      }
                                            

?>




</div>
<?php include "footer.php"; ?>

</body>
</html>
