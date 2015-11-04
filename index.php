<?php

$conexion = mysqli_connect('localhost','root','','bd_pr02_intranet') or die ('No se ha podido conectar');

if(isset($_REQUEST['error'])){
  $fail = $_REQUEST['error'];
}

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
          <section id="centroLogin">
            <header id="headerLogin">
              <div id="headerCentro">
                <h2>INTRANET</h2>
              </div>
            </header>
            <div id="contenido">
              <div id="formCentro">
                <form id="formLogin" action="php/validar_usuario.php" method="get" onsubmit="return validar();">
                  <p>Usuario:</p>
                  <input id="user" class="user" type="email" name="user" size="30" value=" " autofocus required onblur="validarUser(this.value)" onfocus="borrar('user')" autocomplete="off">
                  <p>Contraseña:</p>
                  <input id="pass" class="pass" type="password" name="pass" size="30" maxlength="8" value=" " required onblur="validarPass(this.value)" onfocus="borrar('pass')" autocomplete="off">
                  <input type="submit" class="submit" name="entrar" value=" Entrar ">
                  <input type="reset" class="reset" name="borrar" value=" Borrar " onclick="formatearForm();">
                </form>
              </div>
            </div>
            <div id="error">
              <p>
                <?php
                  if(!empty($fail)){
                    echo $fail;
                  }?>
              </p>
            </div>
          </section>
        </main>
    </body>
</html>
