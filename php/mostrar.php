<?php

    //tbl_material.id_material, tbl_material.tipo_material, tbl_material.descripcion, tbl_material.disponible
    $sql = "SELECT * FROM tbl_material";

    $datos = mysqli_query($conexion,$sql);
?>
    <div id="barraNegraDatos">
    	 <div id="barraOpciones">
         <form action="mostrar.php" method="get">
           <ul id="opciones">
             <li><input type="checkbox" name="opciones" value="1">Aula</li>
             <li><input type="checkbox" name="opciones" value="2">Material informático</li>
             <li><input type="checkbox" name="opciones" value="3">Sin reserva</li>
           </ul>
         </form>
       </div>
    </div>
<?php
  if(mysqli_num_rows($datos)!=0){
    while ($mostrar = mysqli_fetch_array($datos)) {
?>
  <div id="divMaterial">
    <form id="formMaterial" action="main.php" method="get" onsubmit="">

      <input type="submit" class="submit" name="entrar" value=" Reservar ">
    </form>
  </div>
<?php
    }
  }else{
    echo "No hay datos";
  }

?>
