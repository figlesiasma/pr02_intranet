<?php

$conexion = mysqli_connect('localhost','root','','bd_pr02_intranet') or die ('No se ha podido conectar');

?>

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
      <div id="barraNegra">
        <div id="barraLogin">
          <ul id="listaLogin">
            <li id="identificate"></li>
          </ul>
        </div>
      </div>
      <header>
        <section id="cabecera">
          <figure>
            <a href="index.php"><img src="img/logo.png"/></a>
          </figure>
          <nav>
            <ul>
              <li>INICIO</li>
              <li>HISTORIA</li>
              <li>CONTACTO</li>
            </ul>
          </nav>
        </section>
      </header>
        <main>
        	<section id="centro">
            <?php
              $user = $_REQUEST['user'];
              $pass = $_REQUEST['pass'];

              $sql = "SELECT * FROM tbl_usuario WHERE email='$user' AND password='$pass'";

              $query = mysqli_query($conexion,$sql);

                if(mysqli_num_rows($query)==1){
                  echo "<script>document.getElementById('identificate').innerHTML='$user';</script>";
                  include 'php/mostrar.php';
                }else{
                  header('location: index.php?error=No existe el usuario');
                }

            ?>
        	</section>
        </main>
    </body>
</html>
