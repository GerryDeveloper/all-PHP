<?php

class UserSession {
  // solamente vamos a manejar la sesion
  public function __construct() {
    session_start(); // inicializamos el ambiente para manejar sesiones
    // a partir de ahora es necesario llamar esta funcion para identificar sesiones o los valores de las sesiones
  }

  // cada vez que creemos un usuario de tipo UserSession se va a inicializar el ambiente de sesion
  public function setCurrentUser($user) {
    // funcioan ayudara a ponerle un valor a mi sesion actual
    $_SESSION['user'] = $user;
  }

  public function getCurrentUser() {
    return $_SESSION['user'];
  }

  public function closeSesion() {
    session_unset(); // borra los valores de las sesiones
    session_destroy(); // destruye las sesiones como tal
  }

}

?>