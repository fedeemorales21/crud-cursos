<?php

session_start();

unset($_SESSION["nombre"]);
// unset($_SESSION["perfil"]);
$_SESSION=array();
session_destroy();

header('location:index.php');


?>