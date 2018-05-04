

        
<?php

// menu para cambiar de lengua si las cookies están activas, si no no se muestra

if (isset($_COOKIE['idioma'])){
     header("Location: Inicio.php");
}else{
  echo "<link rel='stylesheet' type='text/css' href='css/inicio.css'>";
  echo "<div class='Opciones'><h1>Escoge un idioma</h1><fieldset><form method='POST' action='Idioma.php'>
  <select name='idioma'>
    <option value='es'>Español</option>
    <option value='en'>Ingles</option>
  </select>
  <input type='submit' value='Aceptar'>
  </form></fieldset>
</div";
  
  /*
 echo "<div id='google_translate_element'></div>

<script type='text/javascript'>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>";
}
  
    echo "<div id='google_translate_element'></div><script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>
    <script type='text/javascript'>
      function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en,es,fr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
    </script>";
}
/*

// menu para cambiar de lengua si las cookies están activas, si no no se muestra

if (isset($_COOKIE['idioma'])){
     header("Location: Inicio.php");
}else{
    echo "<div id='google_translate_element'></div><script type='text/javascript'>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>";
}*/
}
?>