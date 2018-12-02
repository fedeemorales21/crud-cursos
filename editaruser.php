<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Usuario</title>

  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <script src="js/all.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
<?php include "navbar.php"; ?>
<?=$nav?>
<main>
<h1 class="center">Modificación de usuario</h1>

<?php
  include 'conexion.php';

  if (!isset($_POST["btn_act"])) {
    $id=$_GET['id'];
    $nom=$_GET['nom'];
    $ape=$_GET['ape'];
    $dni=$_GET['dni'];
    $tel=$_GET['tel'];
    $mail=$_GET['mail'];
    $tipo=$_GET['tipo'];
  }else {
    $err=0;
    $id=( isset($_POST['id']) && !empty($_POST['id']) )? htmlentities(addslashes($_POST["id"])):$err++;
    $nom=( isset($_POST['nom']) && !empty($_POST['nom']) )? htmlentities(addslashes($_POST["nom"])):$err++;
    $ape=( isset($_POST['ape']) && !empty($_POST['ape']) )? htmlentities(addslashes($_POST["ape"])):$err++;
    $dni=( isset($_POST['dni']) && !empty($_POST['dni']) )? htmlentities(addslashes($_POST["dni"])):$err++;
    $tel=( isset($_POST['tel']) && !empty($_POST['tel']) )? htmlentities(addslashes($_POST["tel"])):$err++;
    $mail=( isset($_POST['mail']) && !empty($_POST['mail']) )? htmlentities(addslashes($_POST["mail"])):$err++;
    $tipo=( isset($_POST['tipo']) && !empty($_POST['tipo']) )? htmlentities(addslashes($_POST["tipo"])):$err++;

    if ($err==0) {
      $sql="UPDATE personas SET nombre=:nom,apellido=:ape,dni=:dni,telefono=:tel,email=:mail,tipo=:tipo WHERE cod_persona=:id";
      $resultado = $base->prepare($sql);
      $resultado->execute(array(":id"=>$id,":nom"=>$nom,":ape"=>$ape,":dni"=>$dni,":tel"=>$tel,":mail"=>$mail,":tipo"=>$tipo));
      header("Location:adm_usuarios.php");
    }
  }

  if (isset($_POST["btn_can"])){
    header("Location:adm_usuarios.php");
  }

 ?>



<p>&nbsp;</p>
<div class="container">
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="fedit_user">
  <table>
    <tr>
      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"></td>
    </tr>
    <tr>
      <td class="center">Nombre</td>
      <td>
        <label for="nom"></label>
        <input type="text" name="nom" id="nombre" value="<?php echo $nom; ?>">
      </td>
    </tr>
    <tr>
      <td class="center">Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="apellido"value="<?php echo $ape; ?>"></td>
    </tr>
    <tr>
      <td class="center">DNI</td>
      <td><label for="dni"></label>
      <input type="text" name="dni" id="dni"value="<?php echo $dni; ?>"></td>
    </tr>
    <tr>
      <td class="center">Teléfono</td>
      <td><label for="tel"></label>
      <input type="text" name="tel" id="tel"value="<?php echo $tel; ?>"></td>
    </tr>
    <tr>
      <td class="center">E-mail</td>
      <td><label for="mail"></label>
      <input type="text" name="mail" id="email"value="<?php echo $mail; ?>"></td>
    </tr>
    <tr>
      <td class="center">Tipo</td>
      <td><label for="tipo"></label>
        <select name="tipo" id="tipo">
          <option value="g" <?php if($tipo=='g'){echo "selected";}?>>Alumno</option>
          <option value="p" <?php if($tipo=='p'){echo "selected";}?>>Profesor</option>
          <option value="a" <?php if($tipo=='a'){echo "selected";}?>>Administrador</option>
        </select>
      </td>
    </tr>
     <tr>
        <td>
        <button data-position="left" data-tooltip="Cancelar" class="red btn waves-effect waves-light tooltipped center" name="btn_can">
          <i class="fas fa-times material-icons prefix"></i>
          </button>
        </td>
      <td class="right">
           <button data-position="right" data-tooltip="Guardar cambios" class="green btn waves-effect waves-light tooltipped" type="submit" name="btn_act">
            <i class="far fa-save material-icons prefix"></i>
            </button>
        </td>
    </tr>
  </table>
</form>
</div>
<p>&nbsp;</p>
</main>
<?php include "footer.php" ?>
  <?=footer()?>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>

</body>
</html>
