<?php
//se continúa la sesión
session_start();

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
$sql = "SELECT tbl_reservas.id_reserva, tbl_reservas.id_material, tbl_usuario.email, tbl_reservas.hora_entrada, tbl_reservas.hora_salida, COUNT(tbl_reservas.id_material) as 'Nº Reservas', tbl_material.descripcion, tbl_material.disponible
        FROM tbl_reservas
        INNER JOIN tbl_usuario on tbl_usuario.id_usuario = tbl_reservas.id_usuario
        INNER JOIN tbl_material on tbl_material.id_material = tbl_reservas.id_material";

//comprobación si está instanciada la variable opciones (viene de un select de filtrado en el formulario de cabecera)
if(isset($_REQUEST['opciones'])){
  //si los valores son mayores de 0,
  if ($_REQUEST['opciones']>0) {
    //se añadirá a la consulta según: 0 - Aulas, 1 - Material informático
    $sql .= " WHERE tbl_reservas.id_tipo_material = ".$_REQUEST['opciones'];
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

<a name="top">
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
              <a href="main.php"><li>INICIO</li></a>
              <a href="reserva.php"><li>RESERVAS</li></a>
            </ul>
          </nav>
        </section>
      </header>
      <div id="barraNegraDatos">
         <div id="barraOpciones">

           <!-- FORMULARIO SELECT PARA FILTRAR EL CONTENIDO -->
           <form action="reserva.php" method="get">
             <select name="opciones">
               <option value="" disabled selected>Filtrar por...</option>
               <option value="0">Todo</option>
               <?php
                  //Rellenar datos del SELECT con los datos de la base de datos
                  $sqlTipo = "SELECT * FROM tbl_tipo_material";
                  //consulta del select
                  $query = mysqli_query($conexion,$sqlTipo);
                  //mientras por cada dato en el array $query
                  while ($mostrarOpciones = mysqli_fetch_array($query)) {
                  //crea una opción en el dato extraido de la base de datos
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
            //consulta de datos según el filtrado
              $datos = mysqli_query($conexion,$sql);
              //si se devuelve un valor diferente a 0 (hay datos)
              if(mysqli_num_rows($datos)!=0){
                while ($mostrar = mysqli_fetch_array($datos)) {
            ?>
            <!-- PARTE DONDE SE VA A MOSTRAR LA INFORMACIÓN -->
            <br/>
            <div id="divMaterialReserva">
                <table>
                  <tr>
                    <td>Id Reserva</td>
                    <td>Foto</td>
                    <td>Descripción</td>
                    <td>Reservado</td>
                    <td>Devuelto</td>
                    <td>Disponibilidad</td>
                    <td>Usuario</td>
                  </tr>
                  <tr>
                    <td><?php $mostrar['id_reserva'];?></td>
                    <td><img class ="fotoMiniConsulta" src="img/material/<?php echo $mostrar['id_material']; ?>.jpg" alt="" title"" /></td>
                    <td><?php $mostrar['email'];?></td>
                    <td><?php $mostrar['hora_entrada'];?></td>
                    <td><?php $mostrar['hora_salida'];?></td>
                    <td><?php $mostrar['disponible'];?></td>
                    <td><?php $mostrar['email'];?></td>
                  </tr>
                </table>
            </div>
            <br/>
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
SELECT tbl_reservas.id_reserva, tbl_reservas.id_material, tbl_usuario.email, tbl_reservas.hora_entrada, tbl_reservas.hora_salida, COUNT(tbl_reservas.id_material) as 'Nº Reservas', tbl_material.descripcion, tbl_material.disponible
        FROM tbl_reservas
