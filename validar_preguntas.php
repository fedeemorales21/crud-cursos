<?php
    session_start();
    if ($_SESSION['perfil']!='p') {
        header("location:index.php");
    }
?>

<?php
    $preg_desc = (isset($_POST['desc']) && !empty($_POST['desc'])) ? $_POST['desc'] : 'error';
    $preg_tipo = (isset($_POST['tipo']) && !empty($_POST['tipo'])) ? $_POST['tipo'] : 'error';
    $preg_curso = (isset($_POST['curso']) && !empty($_POST['curso'])) ? $_POST['curso'] : 'error';
    include "conexion.php";
    $sql="INSERT INTO preguntas (preg_desc,preg_tipo,curso_cod) VALUES(:descr,:tipo,:curso)";
    $resultado= $base->prepare($sql);
    $resultado->execute(array(":descr"=>$preg_desc,":tipo"=>$preg_tipo,":curso"=>$preg_curso));
    header("Location:index.php");
?>