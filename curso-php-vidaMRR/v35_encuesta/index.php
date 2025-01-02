<?php

// include_once "includes/db.php"; // ejemplo antes de hacer survey.php
include_once "includes/survey.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css"> 
  <title>Encuesta</title>
  
</head>
<body>
  <form action="#" method="post">
    
    <?php
      $survey = new Survey();
      $showResults = false;

      if(isset($_POST['lenguaje']) ) {
        $showResults = true;
        $survey->setOptionSelected($_POST['lenguaje']);
        $survey->vote();
      }

      // echo $survey->getTotalVotes();
    ?>
    <h2>Cual es tu lenguaje de programacion favorito?</h2>
    <?php
    // los inputs debemos ocultarlos en funcion de la variable showResults, que determina la vista
      if($showResults) {
        $lenguajes = $survey->showResults(); // devuelve un obj

        echo '<h2>' . $survey->getTotalVotes() . " votos totales</h2>";

        foreach($lenguajes as $lenguaje) {
          $porcentaje = $survey->getPercentageVotes($lenguaje['votos']); // recorrido para cada opcion

          // include_once "vistas/vista-resultados.php"; // profe
          include "vistas/vista-resultados.php"; // mi codigo
        }
      } else {
        include "vistas/vista-votacion.php";
      }
    ?>

    <!-- on vista-votacion.php -->
  </form>

<?php

  $db = new DB();
  $db->connect();

?>
  
</body>
</html>