<?php
//se continúa con la sesión
session_start();

//se realiza la conexión a la base de datos
$conexion = mysqli_connect('localhost','root','','bd_pr02_intranet') or die ('No se ha podido conectar'. mysql_error());

//consulta de inserción
$insert = "INSERT INTO tbl_reservas (id_usuario, hora_entrada, id_material)
          SELECT tbl_usuario.id_usuario as id_usuario, CURRENT_DATE() as hora_entrada, $_REQUEST[material] as id_material
          FROM tbl_usuario WHERE tbl_usuario.email = '$_SESSION[sUser]'";

//se realiza la consulta o muestra el error
mysqli_query($conexion,$insert) or die ('La consulta ha fallado: '. mysql_error());

//se redirige a la pantalla main con un mensaje
header('location: ../main.php?mensaje=La petición se ha realizado correctamente');

?>
