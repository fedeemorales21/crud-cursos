<?php
  include 'conexion.php';
  $id = $_GET['id'];
  $base->query("DELETE FROM cursos WHERE curso_cod = '$id'");
  
  // $arr = $base->query("SELECT preg_nro FROM preguntas WHERE curso_cod = '$id'")->fetchAll(PDO::FETCH_OBJ);

  //   foreach ($arr as $pregunta) {
    
  //     echo $pregunta->preg_nro;

  //   }    

  header('Location:altacurso.php');
  //solucionar tama con fk
 ?>