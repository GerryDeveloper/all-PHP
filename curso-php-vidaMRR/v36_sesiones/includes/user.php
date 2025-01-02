<?php

// vamos a manejar la parte del usuario, validar que existe al hacer login, 
// y obtener el usuario como tal, nombre y username

class User extends DB {
  private $nombre;
  private $username;

  public function userExists($user, $pass) {
    $md5pass = pass($pass);

    $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND password = :pass;');
    $query->execute(['user' => $user, 'pass' => $md5pass]);

    if ($query->rowCount() ) { // rawCount es una funcion que me permite saber el numero de filas
      return true; // si hay filas
    } else {
      return false;
    }
  } 

  public function setUser($user) { // de acuerdo a un nombre de usuario vamos a llenar la propiedades
    $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
    $query->execute(['user' => $user]);

    foreach ($query as $currentUser) {
      $this->nombre = $currentUser['nombre'];
      $this->username = $currentUser['username'];
    }
  }

  public function getNombre() {
    return $this->nombre;
  }

}

?>