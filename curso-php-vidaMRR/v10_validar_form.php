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

      if( isset($_POST['nombre']) ) { // en realidad puede ser cualquier campo

        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $campos = array();

        if($nombre == "") {
          array_push($campos, "El campo nombre no puede estar vacio");
        }

        if($password == "" || strlen($password) < 6 ) {
          array_push($campos, "El campo password no puede estar vacio ni tener menos de 6 caracteres");
        }

        if($email == "" || strpos($email, "@") === false ) { // debemos ser estrictos con el tipo ===, pues 0 es falsey
          array_push($campos, "Ingresa un correo electronico valido");

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
		<input type="text" name="nombre">
		</p>

		<p>
		Password:<br/>
		<input type="password" name="password">
		</p>

		<p>
		correo electrónico:<br/>
		<input type="text" name="email">
		</p>

		<p><input type="submit" value="enviar datos"></p> 
	</form>
</body>
</html>