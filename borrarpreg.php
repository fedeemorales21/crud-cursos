<?php
  include 'conexion.php';
  $id = $_GET['id'];
  $base->query("DELETE FROM preguntas WHERE preg_nro = '$id'");

  header('Location:altapregunta.php');
  //solucionar tama con fk
 ?>