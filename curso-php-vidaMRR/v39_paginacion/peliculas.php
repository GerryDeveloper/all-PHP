<?php

include_once "db.php";

class Peliculas extends DB {
  
  // variables de la paginacion
  private $paginaActual;
  private $totalPaginas;
  private $nResultados;
  private $resultadosPorPagina;
  private $indice;
  // seran usadas en la sentencia sql

  private $error = false;

  function __construct($nPorPagina) {
    // primero inicializamos el constructor de la base de datos
    parent::__construct();

    $this->resultadosPorPagina = $nPorPagina;
    $this->indice = 0;
    $this->paginaActual = 1;

    $this->calcularPaginas();
  }

  function calcularPaginas() {
    $query = $this->connect()->query('SELECT COUNT(*) AS total FROM pelicula');
    // tengo que mapear este resultado
    $this->nResultados = $query->fetch(PDO::FETCH_OBJ)->total;
    $this->totalPaginas = round($this->nResultados / $this->resultadosPorPagina);

    // validamos que pagina se esta pidiendo actualmente
    if (isset($_GET['pagina'])) {
      // validar que pagina sea un numero
      if (is_numeric($_GET['pagina'])) {
        // validar que pagina sea >= 1 o <= atotal paginas
        if ($_GET['pagina'] >= 1 && $_GET['pagina'] <= $this->totalPaginas ) { // +1
          $this->paginaActual = $_GET['pagina'];
          $this->indice = ($this->paginaActual - 1) * ($this->resultadosPorPagina);
          echo $this->indice . " *** [paginaActual-1]: $this->paginaActual, [resultadosPorPagina]: $this->resultadosPorPagina";
        } else {
          echo "No existe esa pagina (esta dentro de las paginas existentes)";
          $this->error = true;
        }
      } else {
        // calcular pagianas
        echo "error al mostrar la pagina (is_numeric)";
        $this->error = true;
      }
      
    }
  }

  function mostrarPeliculas() {
    if (!$this->error) { // si no hay algun error
      // continuar
      $query = $this->connect()->prepare('SELECT * FROM pelicula LIMIT :pos, :n');
      $query->execute(['pos' => $this->indice , 'n' => $this->resultadosPorPagina ]);
      
      foreach ($query as $pelicula) {
        include 'vista-pelicula.php';
      }
    } else {
      echo "error mostrarPeliculas()";
    }
  }

  function mostrarPaginas() {
    $actual = ''; // cambia estilos dependiendo la pagina actual
    echo "<ul>";
    for ($i = 0; $i < $this->totalPaginas; $i++) {
      if(($i + 1) == $this->paginaActual ) {
        $actual = " class='actual'";
      } else {
        $actual = "";
      }
      // echo "<li><a $actual href='?pagina='" . ($i + 1) . "'>" . ($i + 1) . "</a></li>";
      // echo "<li><a " . $actual . " href=''>" . ($i + 1) . "</a></li>"; // it's used this way in the vid
      echo '<li><a ' . $actual . ' href="?pagina=' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
    }
    echo "</ul>";
  }

}

?>