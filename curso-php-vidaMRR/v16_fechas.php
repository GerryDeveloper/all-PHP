<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fechas</title>
	<style>
		body{
			background-color: #5276af;
			height: 100%;
		}
		#container{
			background: white;
			margin: 100px auto;
			padding: 100px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="container">
		<?php
		/*
		*	d - dia del mes (1-31)
		*	m - mes del año (1-12)
		*	Y - año (4 dígitos)
		*	l - día de la semana 
		*	
		*	h - hora en formato 1-12
		*	i - minutos 0-59
		*	s - segundos 0-59
		*	a - am-pm
		*/
		
    // para imprimir una fecha usamos la función date()
    
    date_default_timezone_set('America/Mexico_City'); // sin esto da 28, para justar a la zona horaria
    // date_default_timezone_set('UTC'); // da 28 

    echo "Anio (Y): " . date("Y") . "<br>";
    echo "Mes (m): " . date("m") . "<br>";
    echo "Día (d): " . date("d") . "<br>";
    echo "Día/semana (l): " . date("l") . "<br>";
    echo "<br>";
    echo "Hora (h, 1-12): " . date("h") . "<br>";
    echo "Minutos (i, 0-59): " . date("i") . "<br>";
    echo "Segundos (s, 0-59): " . date("s") . "<br>";
    echo "am-pm (a): " . date("a") . "<br>";

    echo "<br>";
    $mes = array("enero", "febrero", "marzo", "abril", "mayo",
     "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

    echo "Fecha: " . date("l") . " " . date("d") . " de " . $mes[date("m")-1] . " de " . date("Y") . "<br>";
    echo "Son las " . date("h:i:sa");


    // practice
		// $mes = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");

		// echo "Fecha: " . date("l") . " " . date("d") . " de " . $mes[date("m")-1] . " de " . date("Y") . "<br>";
		// echo "Son las " . date("h:i:sa");

			
		?>
	</div>
</body>
</html>









