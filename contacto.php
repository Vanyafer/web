<!DOCTYPE html>
<html>
<head>
	<title>Contacto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/contacto.css">
    <script src="js/jquery.min.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOgXcjv2qNk2QVFTGT263zXjJTrzRq6fA&callback=initMap"
    async defer></script>
</head>
<body>
<?php include "barra.php"; ?>

<div id="map"></div>

<div id="Formulario">
	<form action="contacto.php" method="POST">
		<h1>Contacto</h1>
		<p>Nombre</p>
		<input type="text" name="Nombre" id="Nombre" value="Nombre" onBlur="if(this.value=='')this.value='Nombre'" onFocus="if(this.value=='Nombre')this.value='' ">
		<p>Correo</p>
		 <input type="email" name="Correo" id="Correo" value="Correo" onBlur="if(this.value=='')this.value='Correo'" onFocus="if(this.value=='Correo')this.value='' ">
		 <p>Telefono</p>
		 <input type="text" name="Telefono" id="Telefono" value="Telefono" onBlur="if(this.value=='')this.value='Telefono'" onFocus="if(this.value=='Telefono')this.value='' ">
		 <p>Mensaje</p>
		 <input type="text" name="Mensaje" id="Mensaje" onBlur="if(this.value=='')this.value='Mensaje'" onFocus="if(this.value=='Mensaje')this.value='' ">
		 <p></p>
		 <input type="submit" name="Enviar" value="Enviar">
	</form>
	<?php include "correo.php"; ?>
</div>

    <script>
      function initMap() {
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 20.7034438, lng: -103.3876229}, 

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
		var marker = new google.maps.Marker({
    		position: {lat: 20.7034438, lng: -103.3876229},
    		map: map,
    		title: 'MooCouture'

  		});
      }

    </script>
   
</body>
</html>
