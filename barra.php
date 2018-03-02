<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="barra.css">
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
        <li><a href="">Registrarse</a></li>
        <li><a href="">Sesion</a></li>
        <li><a href="contacto.php">Contacto</a></li>
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
                <li><a class="dropdown-item" href="#">Blusas</a></li>
                <li><a class="dropdown-item" href="#">Vestidos</a></li>
                <li><a class="dropdown-item" href="#">Pantalones</a></li>
                <li><a class="dropdown-item" href="#">Faldas</a></li>
              </ul>
          </div>
        </li>
        <li class="esconder">
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

      <form class="navbar-form navbar-right">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>
    </div>
</nav>
</body>
</html>