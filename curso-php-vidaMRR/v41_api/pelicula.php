<?php

include_once 'db.php';

// trata solamente con la base de datos con la tabla de peliculas

class Pelicula extends DB {

  function obtenerPeliculas() {
    $query = $this->connect()->query('SELECT * FROM pelicula');

    return $query;
  }
}

?>