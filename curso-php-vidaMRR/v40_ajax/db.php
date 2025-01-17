<?php

class DB {
  private $host;
  private $db;
  private $user;
  private $password;
  private $charset;
// mising db

  public function __construct() { // funcion que se ejecuta cuando creamos un nuevo objeto
     $this->host = "localhost";
     $this->db = "todolistdb";
     $this->user = "root";
     $this->password = "6q0Y6GF8@";
     $this->charset = "utf8mb4";

  }

  public function connect() { // si se omite public, por defecto se le considera public
    try {
      $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
      $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                  PDO::ATTR_EMULATE_PREPARES => false]; 
                // para permitir a pdo obtener errores de forma mas sintactica

      $pdo = new PDO($connection, $this->user, $this->password, $options,);

      return $pdo;
    } catch (PDOException $e) {
      printr_r("Error connection: " . $e->getMessage() );
    }
  }
}

?>