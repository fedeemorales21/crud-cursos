<?php
  include 'conexion.php';
  

  if (isset($_POST['btn_reg'])) {
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $dni= $_POST["dni"];
    $telefono=$_POST['tel'];
    $email=$_POST["email"];
    $pass=password_hash($_POST["pass"],PASSWORD_DEFAULT);

    $sql="INSERT INTO personas (nombre,apellido,dni,telefono,email,pass) VALUES(:nom,:ape,:dni,:tel,:email,:pass)";
    $resultado= $base->prepare($sql);
    $resultado->execute(array(":nom"=>$nombre,":ape"=>$apellido,":dni"=>$dni,":tel"=>$telefono,"email"=>$email,":pass"=>$pass));
    header("Location:index.php");
  }
 ?>