<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Editar Curso</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link rel="stylesheet" href="css/style.css">

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
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $prof=$_POST['prof'];
    $desc=$_POST['desc'];
    $fec=$_POST['fec'];
    $sql="UPDATE cursos SET curso_nombre=:nom,curso_profesor=:prof,curso_desc=:descr,curso_fecha=:fec WHERE curso_cod=:id";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":id"=>$id,":nom"=>$nom,":prof"=>$prof,":descr"=>$desc,":fec"=>$fec));
    header("Location:altacurso.php");
  }

 ?>


<p>

</p>
<p>&nbsp;</p>
<div class="container">
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table>
    <tr>
      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"></td>
    </tr>
    <tr>
      <td class="center">Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom"value="<?php echo $nom; ?>"></td>
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
      <input type="text" class="datepicker" name="fec" id="fec"value="<?php echo $fec; ?>"></td>
    </tr>

     <tr>
        <td></td>
      <td class="right">
           <button data-position="right" data-tooltip="Guardar cambios" class="green btn waves-effect waves-light tooltipped" type="submit" name="btn_act">
                <i class="material-icons">save</i>
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
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            format : "yyyy-mm-dd"
        });
     });


     M.AutoInit();
  </script>
</body>
</html>
