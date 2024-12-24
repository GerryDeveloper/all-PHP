<?php 
// echo "hola mundo desde php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video 6. Condicionales</title>
  <style>

    body{
      font-family: Arial;
      background: #BDE85F;

    }
    div{
      background: white;
      padding: 20px;
      margin: 0 auto;
      width: 200px;
    }
    h1{
      font-size: 36px;
    }

  </style>
</head>
<body>
  <div>
    <?php
      $hora = 15;

      if($hora > 6 && $hora < 12){
        echo "<h1>Hola!, buenos dias.</h1>";
      } else if($hora >= 12 && $hora <= 18){
        echo "<h1>Hola!, buenas tardes.</h1>";
      } else {
        echo "<h1>Hola!, buenas noches.</h1>";
      }
    ?>
  </div>
</body>
</html>