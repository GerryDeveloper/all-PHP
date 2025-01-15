<?php

include_once 'db.php';

// trata solamente con la base de datos con la tabla de peliculas

class Pelicula extends DB {

  function obtenerPeliculas() {
    $query = $this->connect()->query('SELECT * FROM pelicula');

    return $query;
  }

  // video 42 filtrar API
  function obtenerPelicula($id) {
    $query = $this->connect()->prepare('SELECT * FROM pelicula WHERE id = :id');
    $query->execute(['id' => $id]); 
    // un arreglo de parametros
    // con esto se evita SQLInyection, como?
    return $query;
  } 

}

?>