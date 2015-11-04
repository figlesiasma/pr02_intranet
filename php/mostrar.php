<?php
//Sentencia para mostrar todos los materiales
$sql = "SELECT tbl_material.id_material, tbl_tipo_material.tipo, tbl_material.descripcion, tbl_material.disponible, tbl_material.incidencia, tbl_material.descripcion_incidencia
        FROM tbl_material
        INNER JOIN tbl_tipo_material ON tbl_tipo_material.id_tipo_material = tbl_material.id_tipo_material";

if(isset($_REQUEST['opciones'])){
  if ($_REQUEST['opciones']>0) {
    $sql .= "WHERE tbl_material.id_tipo_material = ".$_REQUEST['opciones'];
  }
}

?>
    <div id="barraNegraDatos">
    	 <div id="barraOpciones">
         <form action="main.php" method="get">
           <select name="opciones">
             <option value="" disabled selected>Elige una opción</option>
             <option value="0">Todo</option>
             <?php
                //Rellenar datos del SELECT con los datos de la base de datos
                $sqlTipo = "SELECT * FROM tbl_tipo_material";
                //consulta del select
                $query = mysqli_query($conexion,$sqlTipo);
                while ($mostrarOpciones = mysqli_fetch_array($query)) {
                echo "<option value='$mostrarOpciones[id_tipo_material]'>$mostrarOpciones[tipo]</option>";
                }
              ?>
            </select>
            <input type="submit" name="name" value="Mostrar">
         </form>
       </div>
    </div>
<?php

  $datos = mysqli_query($conexion,$sql);
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
