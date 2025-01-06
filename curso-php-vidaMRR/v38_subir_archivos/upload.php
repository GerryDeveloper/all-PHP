<?php

// 1 - vemos que se esta mandando al formulario
// echo $_FILES['file']['name']; // es como una matriz, tiene varias propiedades, una de ellas nombre

// echo "<br><hr><br>";

// ahora veremos todo el contenido del 'file'
// var_dump($_FILES['file']);

// array(6) { ["name"]=> string(65) "un chef japonés preparando sushi con temática Studio Ghibli.png" ["full_path"]=> string(65) "un chef japonés preparando sushi con temática Studio Ghibli.png"
// ["type"]=> string(9) "image/png" ["tmp_name"]=> string(24) "C:\xampp\tmp\php7AF9.tmp" ["error"]=> int(0) ["size"]=> int(227010) }

$directorio = "uploads/";

$archivo = $directorio . basename($_FILES['file']['name']);

// echo $archivo;
// tipo de archvo
$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

// echo $tipoArchivo;

// tamanio del archivo
// valida que es imagen
$checarSiImagen = getimagesize($_FILES['file']['tmp_name']);

// var_dump($size); // si devuelve false, entonces NO se esta subiendo una imagen

if ($checarSiImagen != false) {
  $size = $_FILES['file']['size']; // expresado en bytes (?)

  // validando el tamanio del archivo
  if ($size > 500000) {
    echo "El archivo tiene que ser menor a 500kb";
  } else {
    echo "el archivo SI es menor a 500kb, size($size)";
    // validar el tipo de la imagen NOTA: esta nesteando muchos if..., no me gusta esto
    if ($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" ) {
      // se valido el archivo correctamente
      echo "el archivo SI es de formato jpg/jpeg";

      if (move_uploaded_file($_FILES['file']['tmp_name'], $archivo)) {
        echo "El archvo se subio correctamente: \$archivo: $archivo";
      } else {
        echo "Hubo un error en la subida del archivo";
      }
    } else {
      echo "solo se admiten archivos jpg/jpeg";
    }
  }

} else {
  echo "El documento no es una imagen";
}

?>