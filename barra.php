<?php 
if(!isset($_COOKIE['idioma'])){
     header("Location: index.php");
}
if($_COOKIE['idioma']=='en'){
  echo "<div id='google_translate_element'></div>
<script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>
    <script type='text/javascript'>
      function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
    </script>";
}
session_start();
?>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/barra.css">
    <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
</head>
<body>
<nav>
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                      
      </button>
    </div>
  <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
        <li><a id="registroid" href="registro.php">Registrarse</a></li>
        <li><a id="sesionid" href="sesion.php">Iniciar Sesión</a></li>
        <li><a id="cerses" href="cerrarsesion.php">Cerrar Sesión</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a id="carrid" href="Carrito.php">Carrito</a></li>
        <li><a id="agregar" href="AgregarProducto.php">Agregar producto</a></li>
        <li><a id="agregar" href="Descuentos.php">Descuentos</a></li>
        <li class="esconder"><a href="index.php">Inicio</a></li>

        <li class="esconder">
          <a href="#">Ofertas</a>
        </li> 
        <li class="esconder">
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
        <li class="esconder">
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
        <?php
        if(isset($_SESSION['id_usuario'])){
            echo '<ul class="nav navbar-nav navbar-right">';
            echo "<li><a>Bienvenido, ".$_SESSION['usuario']."</a></li>";
            echo '</ul>';
        }
        if(isset($_SESSION['id_admin'])){
            echo '<ul class="nav navbar-nav navbar-right">';
            echo "<li><a>Bienvenido, ".$_SESSION['usuario']."</a></li>";
            echo '</ul>';
        }
        ?>
     
    
            
      <!--form class="navbar-form navbar-right">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>
    </div-->
</nav>
</body>
</html>

<?php
    if(isset($_SESSION['id_usuario'])){
        echo "<script Language='JavaScript'>document.getElementById('registroid').style.display='none';</script>";
        echo "<script Language='JavaScript'>document.getElementById('sesionid').style.display='none';</script>";
        echo "<script Language='JavaScript'>document.getElementById('cerses').style.visibility='visible';</script>";
        echo "<script Language='JavaScript'>document.getElementById('carrid').style.visibility='visible';</script>";
        echo "<script Language='JavaScript'>document.getElementById('agregar').style.display='none';</script>";
    }
    else{
      if(isset($_SESSION['id_admin'])){
        echo "<script Language='JavaScript'>document.getElementById('registroid').style.display='none';</script>";
        echo "<script Language='JavaScript'>document.getElementById('sesionid').style.display='none';</script>";
        echo "<script Language='JavaScript'>document.getElementById('cerses').style.visibility='visible';</script>";
        echo "<script Language='JavaScript'>document.getElementById('carrid').style.visibility='visible';</script>";
        echo "<script Language='JavaScript'>document.getElementById('agregar').style.visibility='visible';</script>";
      }
      else{
        echo "<script Language='JavaScript'>document.getElementById('cerses').style.display='none';</script>";
        echo "<script Language='JavaScript'>document.getElementById('carrid').style.display='none';</script>";
        echo "<script Language='JavaScript'>document.getElementById('agregar').style.display='none';</script>";
      }
    }
    ?>