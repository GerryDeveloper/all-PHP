<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validar formulario</title>
	<style>
		body{background-color: #264673; box-sizing: border-box; font-family: Arial;}

		form{
			background-color: white;
			padding: 10px;
			margin: 100px auto;
			width: 400px;
		}

		input[type=text], input[type=password]{
			padding: 10px;
			width: 380px;
		}
		input[type="submit"]{
			border: 0;
			background-color: #ED8824;
			padding: 10px 20px;
		}

		.error{
			background-color: #FF9185;
			font-size: 12px;
			padding: 10px;
		}
		.correcto{
			background-color: #A0DEA7;
			font-size: 12px;
			padding: 10px;
		}
	</style>
</head>
<body>
	<form action="v10_validar_form.php" method="POST">
		<?php
			// solo usamos una vista, asi que vamos a validar el formulario dentro del mismo formulario
      $nombre = "";
      $password = "";
      $email = "";
      // TODO (1) declarar variable;
      $pais = "";
      $nivel = "";
      $lenguajes = array();

      if( isset($_POST['nombre']) ) { // en realidad puede ser cualquier campo

        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        // TODO (2) asignar valor de solicitud POST
        $pais = $_POST['pais'];
        if (isset($_POST['nivel'])) {
          $nivel = $_POST['nivel'];
        } else {
          $nivel = "";
        }
        // v13. Validamos checkboxes, recordar que se maneja como arreglo
        if(isset($_POST['lenguajes']) ) {
          $lenguajes = $_POST['lenguajes'];
        } else {
          $lenguajes = [];
        }

        $campos = array();

        if($nombre == "") {
          array_push($campos, "El campo nombre no puede estar vacio.");
        }

        if($password == "" || strlen($password) < 6 ) {
          array_push($campos, "El campo password no puede estar vacio ni tener menos de 6 caracteres.");
        }

        if($email == "" || strpos($email, "@") === false ) { // debemos ser estrictos con el tipo ===, pues 0 es falsey
          array_push($campos, "Ingresa un correo electronico valido.");

        }
        // TODO (3) Validar que el campo no este vacio
        if($pais == "") {
          array_push($campos, "Selecciona un pais de origen.");
        }
        if($nivel == "") {
          array_push($campos, "Selecciona un nivel de desarrollo.");
        }
        // TODO. validacion
        if ($lenguajes == "" || count($lenguajes) < 2) {
          // si escojen 0 o 1
          array_push($campos, "Selecciona almenos dos lenguajes de programacion.");
        }

        if( count($campos) > 0) {
          // si es mayor a 0 hay algun error
          echo "<div class='error'>";
          for($i = 0; $i < count($campos); $i++) {
            echo "<li>" . $campos[$i] . "</li>";
          }

        } else {
          echo "<div class='correcto'>
                Datos correctos";
        }
        echo "</div>";
        

      }

		?>


		<p>
		Nombre:<br/>
		<input type="text" name="nombre" value="<?php echo $nombre; ?>">
		</p>

		<p>
		Password:<br/>
		<input type="password" name="password" value="<?php echo $password; ?>">
		</p>

		<p>
		correo electrónico:<br/>
		<input type="text" name="email" value="<?php echo $email; ?>">
		</p>

    <!-- v11. validamos lista -->
    <p>
      Pais de origen:
      <br>
      <select name="pais" id="">
        <option value="">Selecciona un pais</option>
        <option value="mx" <?php if($pais == "mx") echo "selected"; ?>>Mexico</option>
        <option value="eu" <?php if($pais == "eu") echo "selected"; ?>>Estados Unidos</option>
        <option value="es" <?php if($pais == "es") echo "selected"; ?>>Espania</option>
        <option value="ar" <?php if($pais == "ar") echo "selected"; ?>>Argentina</option>
        <option value="ch" <?php if($pais == "ch") echo "selected"; ?>>China</option>
      </select>
    </p>

    <!-- v12. Validar radio buttons -->
     <p>
      Nivel de desarrollo
      <br>
      <input type="radio" name="nivel" value="principiante"
        <?php if($nivel == "principiante") echo "checked"; ?>> Principiante
      <input type="radio" name="nivel" value="intermedio" 
        <?php if($nivel == "intermedio") echo "checked"; ?>> Intermedio
      <input type="radio" name="nivel" value="avanzado"
        <?php if($nivel == "avanzado") echo "checked"; ?>> Avanzado
     </p>

     <!-- v13. Validamos checkboxes -->
      <p>
        Lenguajes de programacion
        <br>
        <input type="checkbox" name="lenguajes[]" value="php"
          <?php if(in_array("php", $lenguajes)) echo "checked"; ?>> PHP <br>
        <input type="checkbox" name="lenguajes[]" value="js"
          <?php if(in_array("js", $lenguajes)) echo "checked"; ?>> JavaScript <br>
        <input type="checkbox" name="lenguajes[]" value="java"
          <?php if(in_array("java", $lenguajes)) echo "checked"; ?>> Java <br>
        <input type="checkbox" name="lenguajes[]" value="swift"
          <?php if(in_array("swift", $lenguajes)) echo "checked"; ?>> Switch <br>
        <input type="checkbox" name="lenguajes[]" value="py"
          <?php if(in_array("py", $lenguajes)) echo "checked"; ?>> Python <br>
      </p>

		<p><input type="submit" value="enviar datos"></p> 
	</form>
</body>
</html>