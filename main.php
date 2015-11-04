<?php
//se continúa la sesión
session_start();

//se comprueba si la variable mensaje devuelto de reservar.php está instanciada.
//Si se ha devuelto, es que el insert ha sido correcto.
if(isset($_REQUEST['mensaje'])){
  //se comprueba si no está vacía
  if(!empty($_REQUEST['mensaje'])){
    //se guarda el contenido en la siguiente variable
    $mensaje = $_REQUEST['mensaje'];
    //se muestra un mensaje en un alert javascript
    echo "<script type='text/javascript'>alert('$mensaje')</script>";
  }
}

//si no está instanciada la sesión
if(!isset($_SESSION['sUser'])){
  //comprueba si está vacia la sesión
  if(empty($_SESSION['sUser'])){
    //en caso afirmativo, redirige a index para login
    header('location: index.php');
  }
}

//conexión a la base de datos o mensaje en caso de error
$conexion = mysqli_connect('localhost','root','','bd_pr02_intranet') or die ('No se ha podido conectar'. mysql_error());

//Sentencia para mostrar todos los materiales de la tabla tbl_material
$sql = "SELECT tbl_material.id_material, tbl_tipo_material.tipo, tbl_material.descripcion, tbl_material.disponible, tbl_material.incidencia, tbl_material.descripcion_incidencia
        FROM tbl_material
        INNER JOIN tbl_tipo_material ON tbl_tipo_material.id_tipo_material = tbl_material.id_tipo_material";

//comprobación si está instanciada la variable opciones (viene de un select de filtrado en el formulario de cabecera)
if(isset($_REQUEST['opciones'])){
  //si los valores son mayores de 0,
  if ($_REQUEST['opciones']>0) {
    //se añadirá a la consulta según: 0 - Aulas, 1 - Material informático
    $sql .= " WHERE tbl_material.id_tipo_material = ".$_REQUEST['opciones'];
  }
}
?>
<!--INICIO WEB -->
<!DOCTYPE html>
<html>
  <head>
      <title>Oxford Intranet</title>
      <meta lang="es">
      <meta charset="utf-8">
      <meta name="author" content="Felipe, Xavi, Germán">
      <meta name="description" content="Proyecto2_intranet">
      <link rel="icon" type="image/png" href="favicon.ico">
      <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />
      <script type="text/javascript" src="js/funcion.js"></script>
  </head>
    <body>

        <!--BARRA NEGRA SUPERIOR -->
      <div id="barraNegra">
        <div id="barraLogin">
          <ul id="listaLogin">
            <li id="identificate">Hola <?php echo $_SESSION['sUser']?> </li>
            <li><a href="php/salir.php"><img src="img/exit.png" alt="Salir" title="Salir" /></a></li>
          </ul>
        </div>
      </div>

        <!--BARRA DE MENÚ -->
      <header>
        <section id="cabecera">
          <figure>
            <a href="index.php"><img src="img/logo.png"/></a>
          </figure>
          <nav>
            <ul>
              <li><a href="#">INICIO</a></li>
              <li><a href="#">HISTORIA</a></li>
              <li><a href="#">CONTACTO</a></li>
            </ul>
          </nav>
        </section>
      </header>

      <!-- FORMULARIO SELECT PARA FILTRAR EL CONTENIDO -->
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
        <main>
        	<section id="centro">
            <?php
              $datos = mysqli_query($conexion,$sql);
              if(mysqli_num_rows($datos)!=0){
                while ($mostrar = mysqli_fetch_array($datos)) {
            ?>

              <!-- PARTE DONDE SE VA A MOSTRAR LA INFORMACIÓN -->
              <div id="divMaterial">
                <form action="php/reservar.php" method="get">
                  <br/>
                  <p>Id: <?php echo $mostrar['id_material']; ?><p>
                  <p>Tipo: <?php echo utf8_encode($mostrar['tipo']); ?><p>
                  <p>Descripción: <?php echo utf8_encode($mostrar['descripcion']); ?><p>
                  <p>Disponibilidad: <?php
                    if(!$mostrar['disponible']){
                      echo "Disponible";
                    }else {
                      echo "No disponible";
                    }
                  ?><p>
                  <p>Incidencia:<?php
                    if($mostrar['incidencia']){
                      echo "Si";
                    }else {
                      echo "No";
                    }
                  ?><p>
                  <p>Tipo de incidencia:<?php echo utf8_encode($mostrar['descripcion_incidencia']); ?><p>
                  <input type="hidden" name="material" value="<?php echo $mostrar['id_material']; ?>">
                  <input type="submit" id="reservar" name="reservar" value="Reservar">
                </form>
              </div><br/>
            <?php
                }
              }else{
                echo "No hay datos";
              }
            ?>
        	</section>
        </main>
    </body>
</html>
