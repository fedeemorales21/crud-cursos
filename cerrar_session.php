<?php

session_start();

unset($_SESSION["nombre"]);
unset($_SESSION["perfil"]);
unset($_SESSION["numid"]);
$_SESSION=array();
session_destroy();

header('location:index.php');


?>