<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insertar Datos</title>
</head>
<body>
  <h1>Hola mundillo

  </h1>
  <form action="index.php" method="POST">
    <input type="text" name="texto" id="texto">
    <input type="submit" value="Agregar pendiente"></input>
  </form>

  <div id="todolist">
    <?php
    $servidor = "localhost";
    $nombre_usuario = "root";
    $password = "6q0Y6GF8@";
    $db = "todolistdb";

    $conexion = new mysqli($servidor, $nombre_usuario, $password, $db);

    if ( $conexion->connect_error === true) {
      die("Conexion fallida: " . $conexion->connect_error);
    }

    /** comenzamos a validar:
     * 1- que exista 'texto'
     * 2- necesitamos insertar el texto en la bd
     */

    if (isset($_POST['texto'])) {
      // si existe la var texto, entonces el usuario le dio click a submit
      $texto = $_POST['texto'];
      // echo $texto;

      $sql = "INSERT INTO todotable(texto, completado)
              VALUES ('$texto', false)";

      if ($conexion->query($sql) === true) {
        // echo '<div> <form action=""><input type="checkbox">' . $texto . '</form> </div>';
      } else {
        die("Error al insertar datos: " . $conexion->error);
      }

    } else if (isset($_POST['completar'])){ // sino existe el texto
      // si existe el id entonces lo obtenemos
      $id = $_POST['completar'];

      $sql = "UPDATE todotable SET completado = 1 WHERE id = $id";

      if ($conexion->query($sql) === true) {
        // echo '<div> <form action=""><input type="checkbox">' . $texto . '</form> </div>';
      } else {
        die("Error al ACTUALIZAR los datos: " . $conexion->error);
      }
    }


    $sql = "SELECT * FROM todotable WHERE completado = 0";
    // no es necesario validar, pues en este caso solo devuelve las tuplas, tenga o no
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0 ) { // resultado es un objeto con muchas propiedades
      // echo $resultado->num_rows; // ya que tengo el numero de filas, tengo que mostrar los valores
      // assert($resultado); // no muestra nada, $resultado es objeto complejo
      // print_r($resultado->fetch_assoc()); //Array ( [id] => 1 [texto] => Hola [completado] => 0 [timestamp] => 2024-12-30 02:18:42 )
      while ($row = $resultado->fetch_assoc() ) {
        // assert($row); // que no era assert
        // var_dump($row);
        // echo '<div> <form action=""><input type="checkbox">' . $row['texto'] . '</form> </div>';
        // lo que debemos hacer es dejar la parte del HTML intacto

        ?>
        <div>
          <form method="POST" id="form<?php echo $row['id']; ?>" action="">
            <input name="completar"
              value="<?php echo $row['id']; ?>" 
              id="<?php echo $row['id']; ?>" type="checkbox" onchange="completarPendiente(this)">
            <?php echo $row['texto']; ?>
          </form> 
        </div>
        <?php

      }

    }

    $conexion->close();
    ?>
  </div>

  <script>
    function completarPendiente(e) { // variable tipo e de elemento
      // console.log(e.parentNode.name);
      // let id = e.id;
      let id = "form" + e.id;
      // console.log(id);
      let formulario = document.getElementById(id);
      formulario.submit();
    }
  </script>

</body>
</html>