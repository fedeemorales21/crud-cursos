<?php
  require_once "config.php";
  try {

    $base = new PDO( DB_MOTOR.':host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET UTF8");


  } catch (\Exception $e) {
    die( $e->getMessage);
  }


?>
