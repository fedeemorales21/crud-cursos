<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Pregunta</title>
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
<h1 class="center">Modificación de Pregunta</h1>

<?php
  include 'conexion.php';

  if (!isset($_POST["btn_act"])) {
    $id=$_GET['id'];
    $desc=$_GET['desc'];
    $tipo=$_GET['tipo'];
    $cur=$_GET['cur'];
  }else {
    $id=$_POST['id'];
    $desc=$_POST['desc'];
    $tipo=$_POST['tipo'];
    $cur=$_POST['cur'];
    $sql="UPDATE preguntas SET preg_desc=:descr,preg_tipo=:tipo,curso_cod=:cur WHERE preg_nro=:id";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":id"=>$id,":descr"=>$desc,":tipo"=>$tipo,":cur"=>$cur));
    header("Location:altapregunta.php");
  }

  
  if (isset($_POST["btn_can"])){
    header("Location:altapregunta.php");
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
      <td class="center">Descripción</td>
      <td><label for="desc"></label>
      <input type="text" name="desc" id="desc"value="<?php echo $desc; ?>"></td>
    </tr>
    
    <tr>
      <td class="center">Tipo</td>
      <td><label for="tipo"></label>
        <select name="tipo">
          <option value='opciones' <?php if($tipo=='opciones'){echo "selected";}?>>Opciones</option>
          <option value='texto' <?php if($tipo=='texto'){echo "selected";}?>>Texto</option>
         </select>
      </td>
    </tr>

    <tr>
      <td class="center">Curso</td>
      <td><label for="cur"></label>
      <input type="text" name="cur" id="cur"value="<?php echo $cur; ?>"></td>
    </tr>
     <tr>
        <td>
          <button data-position="left" data-tooltip="Cancelar" class="red btn waves-effect waves-light tooltipped center" name="btn_can">
            <i class="material-icons">close</i>
          </button>
        </td>
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
     M.AutoInit();
  </script>
</body>
</html>
