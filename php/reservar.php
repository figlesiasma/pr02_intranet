<?php
session_start();

date_default_timezone_set('UTC');


$conexion = mysqli_connect('localhost','root','','bd_pr02_intranet') or die ('No se ha podido conectar');

$insert = "INSERT INTO tbl_reservas (id_usuario, hora_entrada, id_material)
          SELECT tbl_usuario.id_usuario as id_usuario, CURRENT_DATE() as hora_entrada, $_REQUEST['material'] as id_material
          FROM tbl_usuario WHERE tbl_usuario.email = '$_SESSION[sUser]'";

//mysqli_query($conexion,$insert);

echo $insert;

//header('location: ../main.php?mensaje=OK');
?>
