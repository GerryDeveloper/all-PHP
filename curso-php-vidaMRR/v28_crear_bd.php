<?php

// recordar que solo son pruebas, no necesariamente es la mejor forma de programar

$servidor = "localhost";
$nombre_usuario = "root";
$password = "6q0Y6GF8@";
$db = "todolistdb";

// $conexion = new mysqli($servidor, $nombre_usuario, $password); // sin especificar db
$conexion = new mysqli($servidor, $nombre_usuario, $password, $db);

if($conexion->connect_error) {
  die("Conexion fallida: " . $conexion->connect_error);
}

/*
$sql = "CREATE DATABASE todolistDB";

if ($conexion->query($sql) === true ) { // === compara tipo y valor
   echo "Base de datos creada exitosamente...";

} else {
  die("Error al crear la base de datos: " . $conexion->connect_error);
}
*/

// vamos a crear una tabla
$sql = "CREATE TABLE todoTable(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    texto VARCHAR(100) NOT NULL,
    completado BOOLEAN NOT NULL,
    timestamp TIMESTAMP
  )";

// falta especificar que base de datos se usara

/*
if ($conexion->query($sql) === true) {
  echo "La tabla se creo correctamente: <<<<<<<<<<" . $conexion->query($sql);
} else {
  die("Error al crear tabla: " . conexion->error); // no es connect_error, pues no es una conexion duuh
}
  */

  // verificamos si la tabla creada ya existe y mostramos un mensaje
  //nombre de la tabla a buscar
  $tabla = "todoTable";

  // consulta para verificar si la tabla existe
  $sql = "SHOW TABLES LIKE '$tabla'";
  $resultado = $conexion->query($sql);

  if ($resultado->num_rows > 0 ) {
    echo "la tabla '$tabla' SI existe en la base de datos '$db'";
  } else {
    echo "la tabla '$tabla' NO existe en la base de datos '$db'";
  }

  // cerrar conexion
  $conexion->close();

?>