<div class="opcion">
  <?php
    $widthBar = $porcentaje * 5; // aumenta la magnitud, sino maximo serian 100 px
    $estilo = "barra";

    if ($survey->getOptionSelected() == $lenguaje['opcion']){
      $estilo = "seleccionado"; // esto cambia la presentacion de la barra
    }

    echo $lenguaje['opcion'];
  ?>
    <div class="<?php echo $estilo; ?>" style="width: <?php echo $widthBar . "px;"; ?>">
      <?php
        echo $porcentaje . "%";
      ?>
    </div>
</div>