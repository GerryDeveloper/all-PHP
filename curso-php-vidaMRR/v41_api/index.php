<?php

include_once "apipeliculas.php";

$api = new ApiPeliculas();

// se manda llamar automaticamente, necesitamos validar el GET

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // validamos que id existe y que sea numerico
  if (is_numeric($id)) {
    $api->getById($id);
  } else {
    $api->error('Los parametros son incorrectos');
  }

  
} else {
  $api->getall();
}




?>