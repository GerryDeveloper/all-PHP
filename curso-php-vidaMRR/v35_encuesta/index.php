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
    <h2>Cual es tu lenguaje de programacion favorito?</h2>

    <?php
      $survey = new Survey();
      if(isset($_POST['lenguaje']) ) {
        $survey->setOptionSelected($_POST['lenguaje']);
        $survey->vote();
      }
    ?>

    <input type="radio" name="lenguaje" id="" value="c"> C <br>
    <input type="radio" name="lenguaje" id="" value="c++"> C++ <br>
    <input type="radio" name="lenguaje" id="" value="java"> Java <br>
    <input type="radio" name="lenguaje" id="" value="swift"> Swift <br>
    <input type="radio" name="lenguaje" id="" value="python"> Python <br>

    <input type="submit" value="Votar!">
  </form>

<?php

  $db = new DB();
  $db->connect();

?>
  
</body>
</html>