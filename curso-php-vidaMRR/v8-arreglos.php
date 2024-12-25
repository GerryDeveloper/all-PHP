<?php 

// es un tipo de datos que puede contener uno o mas elementos

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arreglos</title>
  <style>
    body{
      background-color: #B5CDE6;
      font-family: Arial;
      font-size: 4em;
      padding: 50px;
    }
  </style>
</head>
<body>

<?php 

  $frutas = array('platano', "manzana", "uvas", "fresa");

  print_r($frutas);

  // podemos elegir un valor especifico

  echo $frutas[3];

  echo "<br>";

  echo count($frutas) . " elementos";
  echo "<br>";
  echo sizeof($frutas) . " elementos";
  echo "<br>";

  // recorrer todos sus valores
  for ($i = 0; $i < count($frutas); $i++) {
    echo "elemento $i: " . $frutas[$i] . "<br>";
  }

  // recorrido usando foreach()
  echo "<br>";
  foreach($frutas as $fruta) {
    echo $fruta . " - <br>";
  }

  // usando indice:
  echo "<br>";
  foreach($frutas as $i => $fruta) {
    echo "fruta: $fruta - ($i)<br>";
  }

  // arreglo ASOCIATIVO
  echo "<br>";
  $edades = array("Marcos"=>34, "Tania"=>23, "Omar"=>27);

  print_r($edades);
  echo "<br>";
  // print($edades); // warning: array to string conversion
  echo $edades["Tania"];
  echo "<br>";

  // OPERADOR DE ASIGNACION CLAVE-VALOR: =>
  foreach($edades as $key => $value) {
    echo $key . " tiene el valor de: " . $value . "</br>";
  }

?>
  
</body>
</html>