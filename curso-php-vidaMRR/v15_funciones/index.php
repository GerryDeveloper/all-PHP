<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Funciones</title>
	<style>
		body{background-color: #5492D1; font-family: Arial;}
		#container{background: white; padding: 10px; width: 400px; margin: 150px auto;}
		.error{color: red;}
	</style>
</head>
<body>
	<div id="container">
		<h2>Multiplicaciones</h2>
		<form action="" method="POST">
			<input type="text" name="numero01">
			<input type="text" name="numero02">

			<input type="submit" value="Calcular">
		</form>

		<?php
			include("operaciones.php");
			// validarCampos();
      // echo multiplicar();
      // echo multiplicar(2, 6); // 12
      // multiplicar(2, 99);
      validarCamposExisten();
		?>
	</div>
</body>
</html>