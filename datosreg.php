<?php
  include 'conexion.php';
  

  if (isset($_POST['btn_reg'])) {
    $err=0;
    $nombre= ( isset($_POST['nombre']) && !empty($_POST['nombre']) )? htmlentities(addslashes($_POST["nombre"])):$err++;
    $apellido=( isset($_POST['apellido']) && !empty($_POST['apellido']) )? htmlentities(addslashes($_POST["apellido"])):$err++;
    $dni= ( isset($_POST['dni']) && !empty($_POST['dni']) )? htmlentities(addslashes($_POST["dni"])):$err++;
    $telefono=( isset($_POST['tel']) && !empty($_POST['tel']) )? htmlentities(addslashes($_POST["tel"])):$err++;
    $email=( isset($_POST['email']) && !empty($_POST['email']) )? htmlentities(addslashes($_POST["email"])):$err++;
    $pass=password_hash($_POST["pass"],PASSWORD_DEFAULT);

    if ($err==0) {
      
      $sql="INSERT INTO personas (nombre,apellido,dni,telefono,email,pass) VALUES(:nom,:ape,:dni,:tel,:email,:pass)";
      $resultado= $base->prepare($sql);
      $resultado->execute(array(":nom"=>$nombre,":ape"=>$apellido,":dni"=>$dni,":tel"=>$telefono,"email"=>$email,":pass"=>$pass));
      header("Location:index.php");
    }else {
      header("Location:index.php");
    }
  }
 ?>