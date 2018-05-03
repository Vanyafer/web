<?php

$idioma = $_POST['idioma'];
echo $idioma;
setcookie("idioma",$idioma,time()+259200);
header("Location: Inicio.php");

?>
