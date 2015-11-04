<?php

$sql = "SELECT tbl_material.id_material, tbl_tipo_material.tipo, tbl_material.descripcion, tbl_material.disponible, tbl_material.incidencia, tbl_material.descripcion_incidencia
        FROM tbl_material
        INNER JOIN tbl_tipo_material ON tbl_tipo_material.id_tipo_material = tbl_material.id_tipo_material";


//$sql .= "WHERE tbl_material.disponible = 0";

    //consulta de todas las aulas
    //$sql = "SELECT * FROM tbl_material WHERE tbl_material.id_tipo_material = 1";

    $datos = mysqli_query($conexion,$sql);
?>
    <div id="barraNegraDatos">
    	 <div id="barraOpciones">
           <ul id="opciones">
             <li><button type="button" name="button" value="1" onclick="">Mostrar aulas</button></li>
             <li><button type="button" name="button" value="2">Mostrar material</button></li>
             <li><button type="button" name="button" value="3">Material sin reserva</button></li>
             <li><button type="button" name="button" value="4">Mostrar todo</button></li>
           </ul>
       </div
    </div>
<?php
  if(mysqli_num_rows($datos)!=0){
    while ($mostrar = mysqli_fetch_array($datos)) {
?>
  <div id="divMaterial">
    <br/>
    <p>Id: <?php echo $mostrar['id_material']; ?><p>
    <p>Tipo: <?php echo utf8_encode($mostrar['tipo']); ?><p>
    <p>Descripción: <?php echo utf8_encode($mostrar['descripcion']); ?><p>
    <p>Disponibilidad <?php
      if(!$mostrar['disponible']){
        echo "Disponible";
      }else {
        echo "No disponible";
      }
    ?><p>
    <p>Incidencia:<?php
      if($mostrar['incidencia']){
        echo "No";
      }else {
        echo "Si";
      }
    ?><p>
    <p>Tipo de incidencia:<?php echo utf8_encode($mostrar['descripcion_incidencia']); ?><p>
    <form action="mostrar.php" method="post">

    </form>
  </div><br/>
<?php
    }
  }else{
    echo "No hay datos";
  }

?>
