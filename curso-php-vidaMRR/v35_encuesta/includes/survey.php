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

  public function showResults() {
    // usamos directamente query() sin prepare(), porque no vamos a sustituir ningun valor, es la consulta sin mas
    return $this->connect()->query('SELECT * FROM lenguajes');
  }

  public function getTotalVotes() {
    
    // varias formas de hacerlo
    // 1 - puedo mandar llamar showResults() y sumar los votos
    // 2 - puedo hacer una consulta a mysql en la cual regrese la suma de los votos
    // return $this->connect()->query('SELECT SUM(votos) FROM lenguajes'); // mio
    $query = $this->connect()->query('SELECT SUM(votos) AS votos_totales FROM lenguajes'); // profe
    $this->totalVotes = $query->fetch(PDO::FETCH_OBJ)->votos_totales;
    return $this->totalVotes;
  }

  public function getPercentageVotes($votes) {
    return round(($votes / $this->totalVotes) * 100, 0); // numero decimal, cant. decimales = 0
  }

}

?>