document.getElementById("bEnviar").addEventListener("click", function(){
  // parametros(evento, funcion), la funcion la vamos a usar cuando le de click al boton
  // se ejecute algo
  console.log("click on element: ", document.getElementById("bEnviar"));

  nuevoTodo();
});

function nuevoTodo(){
  let todo = document.getElementById("todo");
  //necesitamos un header porque enviaremos el formulario a travez de ajax
  // similar a submit con POST 
  let header = "todo=" + todo.value; // accede al valor del input
  let xmlhttp = new XMLHttpRequest(); // este objeto nos permitira hacer la solicitud AJAX

  // configuramos el listener para cuando cambie de resultado la solicitud
  xmlhttp.onreadystatechange = function(){
      // vamos a validar el estado cuando mande mi solicitud ajax
      if (this.readyState == 4 && this.status == 200) {
        // la solicitud se completo correctamente
        cargarTodos();
      }
  }; // estado

  xmlhttp.open("POST", "nuevo-todo.php", true); // true = asincrono: como un hilo de ejecucion en el fondo
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // notice: content sent by POST
  xmlhttp.send(header); // con esto se envia la solicitud para solicitar esta pagina
}

function cargarTodos(){
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // solicitud http se configuro correctamente
      document.getElementById("mostrar-todo-container").innerHTML = this.responseText;
      // la respuesta de mi solicitud metela en esta capa
      // con esto se actualiza esta capa y no todo el documento
    }
  };

  xmlhttp.open("GET", "mostrar-todos.php", true);
  xmlhttp.send(); // en esta ocasion no se manda parametro porque es consulta sin ningun filtro
}