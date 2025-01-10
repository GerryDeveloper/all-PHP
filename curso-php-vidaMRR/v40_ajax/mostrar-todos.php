<?php

include_once "todos.php";

  $todos = new Todos();

  // no es necesario validar post, solo se van a mostrar

  $lista = $todos->mostrarTodos();

  foreach($lista as $todo) {
    echo '<div class="pendiente">' . $todo['texto'] . '</div>';
  }


?>