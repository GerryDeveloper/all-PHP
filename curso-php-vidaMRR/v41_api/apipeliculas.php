<?php

// clase que nos permita manejar todas las funciones y comportamientos propios de la api
// aqui no nos interesa conectarnos a la base de datos
// aqui seccionamos las funciones de la api para mandarlas llavar en el index

include_once 'pelicula.php';

class ApiPeliculas {


  function getAll() {
    // permitira mandar llamar el objeto de pelicula
    // el objeto que regresa query tenemos que parcearlo y convertirlo a JSON
    $pelicula = new Pelicula();

    $peliculas = array();
    $peliculas['items'] = array(); // en mi array peliculas un objeto llamado items convertido a array

    $resultado = $pelicula->obtenerPeliculas();

    if ($resultado->rowCount()) { // si es mayor que 0, al parecer es de  manera implicita
      // cuando si hay elementos
      while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $item = array(
          'id' => $row['id'],
          'nombre' => $row['nombre'],
          'imagen' => $row['imagen']
        );
        // ingresamos este elemento al arreglo peliculas existente
        array_push($peliculas['items'], $item);
      
      }

      echo json_encode($peliculas);

    } else {
      // cuando en la tabla no hay ningun elemento, o no hay ningun cambio
      echo json_encode(array('mensaje' => 'no hay elementos registrados'));
    }
  }

}

?>