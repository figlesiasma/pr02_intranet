<?php
session_start();

$conexion = mysqli_connect('localhost','root','','bd_pr02_intranet') or die ('No se ha podido conectar');

  $_SESSION['sUser']= $_REQUEST['user'];
  $_SESSION['sPass'] = $_REQUEST['pass'];

  $sql = "SELECT * FROM tbl_usuario WHERE email='$_SESSION[sUser]' AND password='$_SESSION[sPass]'";

  $query = mysqli_query($conexion,$sql);

    if(mysqli_num_rows($query)==1){
      
      header('location: ../main.php');
    }else{
      header('location: ../index.php?error=No existe el usuario');
    }

?>
