<?php
  include 'conexion.php';
  $id = $_GET['id'];
  $base->query("DELETE FROM cursos WHERE curso_cod = '$id'");

  header('Location:altacurso.php');
  //solucionar tama con fk
 ?>