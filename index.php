<!DOCTYPE html>
<html >
<head>
  <title>MooCouture</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="orden.css">
    <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body  >

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
        <li class="esconder"><a href="#">Inicio</a></li>
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
<header>
 <div class="logo"><img src="nombre.png" >
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
      <a href=""> <img src="img/falda.jpg"></a>
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

<div id="map"></div>
    <script>
      function initMap() {
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8, 
          styles: 
[
    {
        "featureType": "all",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "hue": "#bc00ff"
            },
            {
                "saturation": "0"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#e8b8f9"
            }
        ]
    },
    {
        "featureType": "administrative.country",
        "elementType": "labels",
        "stylers": [
            {
                "color": "#ff0000"
            }
        ]
    },
    {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#3e114e"
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "color": "#a02aca"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "color": "#2e093b"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "labels.text",
        "stylers": [
            {
                "color": "#9e1010"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#ff0000"
            }
        ]
    },
    {
        "featureType": "landscape.natural.landcover",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "color": "#58176e"
            }
        ]
    },
    {
        "featureType": "landscape.natural.landcover",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.business",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "color": "#a02aca"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#d180ee"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "color": "#a02aca"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "color": "#ff0000"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.text",
        "stylers": [
            {
                "color": "#a02aca"
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#cc81e7"
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "hue": "#bc00ff"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#6d2388"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#c46ce3"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#b7918f"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#280b33"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "color": "#a02aca"
            }
        ]
    }
]

        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOgXcjv2qNk2QVFTGT263zXjJTrzRq6fA&callback=initMap"
    async defer></script>

</div>

<footer>
<p>Contacto: Correo: MooCouture@gmail.com Telefono: 3333333333 </p>
</footer>

</body>
</html>