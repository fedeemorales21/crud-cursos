<?php
  include 'conexion.php';
  $id = $_GET['id'];
  $base->query("DELETE FROM personas WHERE cod_persona = '$id'");

  header('Location:adm_usuarios.php');

 ?>