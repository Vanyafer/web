<!DOCTYPE html>
<html >
<head>
  <title>MooCouture</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/orden.css">
    <script src="js/jquery.min.js"></script>
</head>
<body  >
<?php include "barra.php"; ?>
<header>
 <div class="logo"><img src="img/nombre.png" >
</div> 
<nav class="menu">
 
      <ul class="menu-lista">
        <li class="nav-item"><a href="#">Inicio</a></li>
        <li class="nav-item">
          <a href="#">Ofertas</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Ropa
          </a>
          <div class="dropdown-menu">
             <ul>
                <li><a class="dropdown-item" href="#">Blusas</a></li>
                <li><a class="dropdown-item" href="#">Vestidos</a></li>
                <li><a class="dropdown-item" href="#">Pantalones</a></li>
                <li><a class="dropdown-item" href="#">Faldas</a></li>
              </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
           Accesorios
          </a>
          <div class="dropdown-menu">
              <ul>
                <li><a class="dropdown-item" href="#">Collares</a></li>
                <li><a class="dropdown-item" href="#">Lentes</a></li>
                <li><a class="dropdown-item" href="#">Bisuteria</a></li>
                <li><a class="dropdown-item" href="#">Bolsos</a></li>
              </ul>
          </div>
        </li>
      </ul>
</nav>

</header>

<div class="galeria">
  <div class="articulo">
  <div class="imagen">
      <a href="producto.php"> <img src="img/falda.jpg"></a>
      <div class="desc"><p>Falda a la cintura negra</p><p>$149.99 MXN</p></div>
  </div>
</div>
<div class="articulo">
  <div class="imagen">
      <a href=""><img src="img/lentes4.jpg"></a>
      <div class="desc"><p>Lentes de corazon</p><p>$99.99 MXN</p></div>
  </div>
</div>
<div class="articulo">
  <div class="imagen">
      <a href=""><img src="img/pantalon3.jpg"> </a>
      <div class="desc"><p>Pantalón amarillo-negro</p><p>$189.99 MXN</p></div>
  </div>
</div>
<div class="articulo">
  <div class="imagen">
      <a href=""> <img src="img/falda3.jpg"></a>
      <div class="desc"><p>Falda cuadros</p><p>$139.99 MXN</p></div>
  </div>
</div>
<div class="articulo">
  <div class="imagen">
      <a href=""><img src="img/pantalon4.jpg"></a>
      <div class="desc"><p>Pantalón verde-rojo</p><p>$189.99 MXN</p></div>
  </div>
</div>
<div class="articulo">
  <div class="imagen">
      <a href=""><img src="img/collar1.jpg"> </a>
      <div class="desc"><p>Choker corazón</p><p>$59.99 MXN</p></div>
  </div>
</div>
<div class="articulo">
  <div class="imagen">
      <a href=""> <img src="img/blusa2.jpg"></a>
      <div class="desc"><p>Blusa blanca con rosas</p><p>$109.99 MXN</p></div>
  </div>
</div>
<div class="articulo">
  <div class="imagen">
      <a href=""><img src="img/blusa4.png"></a>
      <div class="desc"><p>Blusa negra con girasoles</p><p>$99.99 MXN</p></div>
  </div>
</div>



</div>

<footer>
<div>Contacto: Correo: MooCouture@gmail.com Telefono: 3333333333 </div>
</footer>

</body>
</html>