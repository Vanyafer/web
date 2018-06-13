<!DOCTYPE html>
<html >
<head>
  <title>MooCouture</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/orden.css">
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
<header>
 <div class="logo"><img src="img/nombre.png" >
</div> 
<nav class="menu">
 
      <ul class="menu-lista">
        <li class="nav-item">
          <a href="#">Ofertas</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Ropa
          </a>
          <div class="dropdown-menu">
             <ul>
                 <li><a class="dropdown-item" href="productos.php?id=1">Blusas</a></li>
                <li><a class="dropdown-item" href="productos.php?id=2">Vestidos</a></li>
                <li><a class="dropdown-item" href="productos.php?id=3">Pantalones</a></li>
                <li><a class="dropdown-item" href="productos.php?id=4">Faldas</a></li>
              </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
           Accesorios
          </a>
          <div class="dropdown-menu">
              <ul>
                <li><a class="dropdown-item" href="productos.php?id=5">Collares</a></li>
                <li><a class="dropdown-item" href="productos.php?id=6">Lentes</a></li>
                <li><a class="dropdown-item" href="productos.php?id=7">Bisuteria</a></li>
                <li><a class="dropdown-item" href="productos.php?id=8">Bolsos</a></li>
              </ul>
          </div>
        </li>
      </ul>
</nav>

</header>

<div class="galeria">
<?php 
include "Conexion.php";
$con = 8;
  $consulta = mysqli_query($conexion,"SELECT * FROM producto order by prodid DESC");

                      while ($con) {
                        $result1 = mysqli_fetch_array($consulta);
                        echo "  <div class='articulo'>
  <div class='imagen' id=".$result1['prodid'].">
      <img src=".$result1['imagen'].">
      <div class='desc'><p>".$result1['nombre']."</p><p>".$result1['precio']."$</p></div>

  </div>
</div>";
$con--;
                      }
                                            

?>




</div>

<?php include "footer.php"; ?>

</body>
</html>
