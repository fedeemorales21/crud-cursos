<?php 
    $id=$_GET['id'];

    $numid=$_GET['us'];
    include "conexion.php";
    $sql="INSERT INTO curso_alumno (curso_nro,alumno_nro) VALUES(:cur,:alu)";
    $resultado= $base->prepare($sql);
    $resultado->execute(array(":cur"=>$id,":alu"=>$numid));
    header("Location:index.php");

?>