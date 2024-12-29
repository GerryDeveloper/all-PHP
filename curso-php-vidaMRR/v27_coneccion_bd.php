<?php

$servidor = "localhost"; // la url a la que nos vamos a conectar
$nombre_usuario = "root";
$password = "6q0Y6GF8@";

$conexion = new mysqli($servidor, $nombre_usuario, $password);

if ($conexion->connect_error) {
  die("Conexion fallida: ". $conexion->conect_error);
}

echo "Conexion exitosa...";

?>