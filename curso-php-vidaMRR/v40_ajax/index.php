<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encode y Decode</title>
  <link rel="stylesheet" href="main.css">
  <!-- vamos a implementar ajax o "llamadas asincronas" que nos permitan actualizar 
   solamente una capa, el div mostrar-todo en este caso -->
</head>
<body>
  <div class="main-container">
    <form id="nuevo-pendiente-container" action="" method="POST">
      <p>
        Que hacer <br>
        <input type="text" name="todo" id="todo">

      </p>
      <p>
        <!-- <input type="submit" id="bEnviar" value="Aniadir todo"> 
         - cambiamos el submit por un boton, porque no quiero que al darle click se envie el formulario
         - sino solamente cachear le listener de click y pueda manipular las acciones que voy a realizar con el 
         - como vamos a usar JavaScript necesitamos colocar id a nuestros elementos -->
        <input type="button" id="bEnviar" value="Aniadir todo">
      </p>
    </form>
  </div>
  <div id="mostrar-todo-container">
    <?php
      // include_once "todos.php";

      // $todos = new Todos();

      // if(isset($_POST['todo'])) {
      //   $todos->nuevoTodo($_POST['todo']);
      // }

      // $lista = $todos->mostrarTodos();

      // foreach($lista as $todo) {
      //   echo '<div class="pendiente">' . $todo['texto'] . '</div>';
      // }

      // dejamos comentado le codigo, pues ya tenemos los archivos mostra-todos.php, nuevo-todo.php
    ?>
  </div>

  <script src="main.js"></script>
  <script>
    cargarTodos();
  </script>

</body>
</html>