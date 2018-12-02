<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Pregunta</title>

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
<h1 class="center">Modificación de Pregunta</h1>

<?php
  include 'conexion.php';

  if (!isset($_POST["btn_act"])) {
    $id=$_GET['id'];
    $desc=$_GET['desc'];
    $tipo=$_GET['tipo'];
    $cur=$_GET['cur'];
  }else {
    $err=0;
    $id=( isset($_POST['id']) && !empty($_POST['id']) )? htmlentities(addslashes($_POST["id"])):$err++;
    $desc=( isset($_POST['desc']) && !empty($_POST['desc']) )? htmlentities(addslashes($_POST["desc"])):$err++;
    $tipo=( isset($_POST['tipo']) && !empty($_POST['tipo']) )? htmlentities(addslashes($_POST["tipo"])):$err++;
    $cur=( isset($_POST['cur']) && !empty($_POST['cur']) )? htmlentities(addslashes($_POST["cur"])):$err++;

    if ($err==0) {
      $sql="UPDATE preguntas SET preg_desc=:descr,preg_tipo=:tipo,curso_cod=:cur WHERE preg_nro=:id";
      $resultado = $base->prepare($sql);
      $resultado->execute(array(":id"=>$id,":descr"=>$desc,":tipo"=>$tipo,":cur"=>$cur));
      header("Location:altapregunta.php");
    }
  }

  
  if (isset($_POST["btn_can"])){
    header("Location:altapregunta.php");
  }

 ?>


<p>

</p>
<p>&nbsp;</p>
<div class="container">
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="feditp">
  <table>
    <tr>
      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"></td>
    </tr>
    <tr>
      <td class="center">Descripción</td>
      <td><label for="desc"></label>
      <input type="text" name="desc" id="desc" value="<?php echo $desc; ?>"></td>
    </tr>
    
    <tr>
      <td class="center">Tipo</td>
      <td><label for="tipo"></label>
        <select name="tipo" id="tipo">
          <option value='opciones' <?php if($tipo=='opciones'){echo "selected";}?>>Opciones</option>
          <option value='texto' <?php if($tipo=='texto'){echo "selected";}?>>Texto</option>
         </select>
      </td>
    </tr>

    <tr>
      <td class="center">Curso</td>
      <td><label for="curso"></label>
      
      <select name="cur" id="curso">
        <?php
          $opc='';
          $reg = $base->query("SELECT * FROM cursos")->fetchAll(PDO::FETCH_OBJ);
          foreach ($reg as $curso){
            
          $opc.="<option value='$curso->curso_cod'";
          
          if ($cur==$curso->curso_cod) { $opc.= ' selected';}
          $opc.=" >$curso->curso_nombre</option>";
           
          }
          echo $opc;
        ?>
          
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
