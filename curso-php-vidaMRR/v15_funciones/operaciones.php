<?php

/** Actividades:
 * 1 - que los datos existan
 * 2 - que sean numericos
 * 3 - validar la operacion (mulipoicacion en este caso)
 */

function multiplicar($num1, $num2) {
  // return "Hola";
  // return $num1 * $num2;
  echo $num1 * $num2;
}

// validamos numeric
function isNumericUD($num1, $num2) {
  if (is_numeric($num1) && is_numeric($num2) ) {
    return true;
  }
//   } else [
//     return
//   ]
  return false;
}

// mensaje de error en caso de no numerico
function mostrarError() {
  echo "<span class='error'>Ingresa solo números</span>";
}

/// validamos que existan los campos
function validarCamposExisten () {
  // if ($num2 != Null && $num2 != Null) {

  // }
  if (isset($_POST['numero01']) && isset($_POST['numero02'])) {
    $num1 = $_POST['numero01'];
    $num2 = $_POST['numero02'];
    if (isNumericUD($num1, $num2) ) {
      echo multiplicar($num1, $num2);
    } else {
      echo mostrarError();
    }
  }
}



// CODIGO YA TERMINADO, repaso
// function multiplicar($n1, $n2){
//   return $n1 * $n2;
// }

// function esNumero($n1, $n2){
//   if(is_numeric($n1) && is_numeric($n2)){
//     return true;
//   }else{
//     return false;
//   }
// }

// function mostrarError(){
//   echo "<span class='error'>Ingresa solo números</span>";
// }

// function validarCampos(){
//   if(isset($_POST['numero01']) && isset($_POST['numero02'])){
//     $n1 = $_POST['numero01'];
//     $n2 = $_POST['numero02'];

//     if(esNumero($n1, $n2)){
//       echo multiplicar($n1, $n2);
//     }else{
//       mostrarError();
//     }
//   }
// }
?>