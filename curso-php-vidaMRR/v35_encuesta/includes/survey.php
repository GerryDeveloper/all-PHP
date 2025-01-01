<?php

include_once "DB.php";

// todos los metodos para votar y mostrar los resultados
class Survey extends DB {
  
  private $totalVotes;
  private $optionSelected;

  // funcionalidad
  public function setOptionSelected($option) {
    $this->optionSelected = $option;
  }

  public function getOptionSelected() {
    return $this->optionSelected;
  }

  public function vote() {
    $query = $this->connect()->prepare('UPDATE lenguajes SET votos = votos + 1 WHERE opcion = :opcion'); //?opcion
    $query->execute(['opcion' => $this->optionSelected]);
  }
}

?>