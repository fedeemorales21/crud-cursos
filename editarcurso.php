<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Editar Curso</title>

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
<h1 class="center">Modificación de Curso</h1>

<?php
  include 'conexion.php';

  if (!isset($_POST["btn_act"])) {
    $id=$_GET['id'];
    $nom=$_GET['nom'];
    $prof=$_GET['prof'];
    $desc=$_GET['desc'];
    $fec=$_GET['fec'];
  }else {
    $err=0;
    $id=( isset($_POST['id']) && !empty($_POST['id']) )? htmlentities(addslashes($_POST["id"])):$err++;
    $nom=( isset($_POST['nom']) && !empty($_POST['nom']) )? htmlentities(addslashes($_POST["nom"])):$err++;
    $prof=( isset($_POST['prof']) && !empty($_POST['prof']) )? htmlentities(addslashes($_POST["prof"])):$err++;
    $desc=( isset($_POST['desc']) && !empty($_POST['desc']) )? htmlentities(addslashes($_POST["desc"])):$err++;
    $fec=( isset($_POST['fec']) && !empty($_POST['fec']) )? htmlentities(addslashes($_POST["fec"])):$err++;
    
    if ($err==0) {
      $sql="UPDATE cursos SET curso_nombre=:nom,curso_profesor=:prof,curso_desc=:descr,curso_fecha=:fec WHERE curso_cod=:id";
      $resultado = $base->prepare($sql);
      $resultado->execute(array(":id"=>$id,":nom"=>$nom,":prof"=>$prof,":descr"=>$desc,":fec"=>$fec));
      header("Location:altacurso.php");
    }
  }

  if (isset($_POST["btn_can"])){
    header("Location:altacurso.php");
  } 

 ?>


<p>

</p>
<p>&nbsp;</p>
<div class="container">
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="feditc">
  <table>
    <tr>
      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"></td>
    </tr>
    <tr>
      <td class="center">Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nombre"value="<?php echo $nom; ?>"></td>
    </tr>
    
    <tr>
      <td class="center">Profesor</td>
      <td><label for="prof"></label>
      <input type="text" name="prof" id="prof"value="<?php echo $prof; ?>"></td>
    </tr>

    <tr>
      <td class="center">Descripción</td>
      <td><label for="desc"></label>
      <input type="text" name="desc" id="desc"value="<?php echo $desc; ?>"></td>
    </tr>

    <tr>
      <td class="center">Fecha</td>
      <td><label for="fec"></label>
      <input type="text" class="datepicker" name="fec" id="fecha"value="<?php echo $fec; ?>"></td>
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
  <script type="text/javascript" src="js/script-modificado.js"></script>

</body>
</html>
