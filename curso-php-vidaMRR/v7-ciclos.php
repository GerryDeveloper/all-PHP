<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>video 7. Ciclos</title>
  <style>
    body{
      background-color: #E85F79;
      text-align: center;
    }
    img{
      width: 150px;
      height: 150px;
      margin: 5px;
    }
  </style>

</head>
<body>
  <!-- primera forma
   <?php
    for($i=0; $i < 10; $i++){
      echo '<img src="images\girl-playing-a-violin.jpg" alt="" srcset="">';
    }
  ?> -->
  <!-- segunda forma -->
  <?php
    for($i=0; $i < 10; $i++){
  ?>
  <img src="images\girl-playing-a-violin.jpg" alt="" srcset="">
  <?php
    }
  ?>
  <hr>
  <br>

  <?php
    while(rand(1,10) != 5 ) {
    
  ?>
    <img src="images\girl-playing-a-violin.jpg" alt="" srcset="">
  <?php
    }
  ?>

</body>
</html>