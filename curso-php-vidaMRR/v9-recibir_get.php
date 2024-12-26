<?php

print_r($_GET);
echo "<br>";

echo $_GET['tipo_usuario'];
echo "<br>";

$usuario = $_GET['tipo_usuario'];
$navegador = $_GET['navegador'];

echo "El usuario es: " . $usuario . "<br>";
echo "y tiene el navegador: " . $navegador . "<br>";

?>