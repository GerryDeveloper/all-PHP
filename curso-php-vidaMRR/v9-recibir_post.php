<?php

print_r($_POST);
echo "<br>";;
print_r($_POST['usuario']);
echo "<br>";
print_r($_POST['password']);


// conectarse a la base de datos
// autenticar el usuario

echo "<hr><br>";
echo "El usuario es: " . $_POST['usuario'];
echo "El password es: " . $_POST['password'];

?>