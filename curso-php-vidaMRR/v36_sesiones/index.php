<?php

include_once 'includes/user.php';
include_once 'includes/user_session.php';

$userSession = new UserSession(); // inicializar el ambiende de sesiones, validar si hay sesiones para redirigir
$user = new User(); // usuario actual

if (isset($_SESSION['user']) ) {
  echo "Hay sesion: [" . $_SESSION . "]";
} else if (isset($_POST['username']) && isset($_POST['password'])) {
  // echo "Validacion de login"; comentamos, ya validamos que si nos lleva ahi
  $userForm = $_POST['username'];
  $passForm = $_POST['password'];

  if ($user->userExists($userForm, $passForm)) {
    echo "usuario validado";
  } else {
    echo "nombre de usuario y/o password incorrecto.";
  }
} else {
  // echo "Login";
  include_once "vistas/login.php";
}

?>