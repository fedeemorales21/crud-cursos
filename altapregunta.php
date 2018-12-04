<?php
    if(isset($_SESSION)) { 
        session_start();
        if ($_SESSION['perfil']!='p') {
            header("location:index.php");
        }
    }    
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!--Import Google Icon Font-->
  <title>Agregar Pregunta</title>
  <script src="js/all.js"></script>
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<?php include "navbar.php";
    include "conexion.php";
 ?>
  <?=$nav?>



<?php
    if (isset($_POST['btn_preg'])) {
      $err=0;
      $preg_desc = ( isset($_POST['desc']) && !empty($_POST['desc']) && strlen($_POST['desc'])<=255 )? htmlentities(addslashes($_POST["desc"])):$err++;
      $preg_tipo =  ( isset($_POST['tipo']) && !empty($_POST['tipo']) && $_POST['tipo']=='texto' || $_POST['tipo']=='opciones' )? htmlentities(addslashes($_POST["tipo"])):$err++;
      $preg_curso =  ( isset($_POST['curso']) && !empty($_POST['curso']) && is_int($_POST['curso']) )? htmlentities(addslashes($_POST["curso"])):$err++;

      if ($err==0) {
        
        $sql="INSERT INTO preguntas (preg_desc,preg_tipo,curso_cod) VALUES(:descr,:tipo,:curso)";
        $resultado= $base->prepare($sql);
        $resultado->execute(array(":descr"=>$preg_desc,":tipo"=>$preg_tipo,":curso"=>$preg_curso));
        header("Location:altapregunta.php");
      }
    }
      
?>



<main class="container">
    <h1 class="center-align">Preguntas</h1>
    <div class="divider"></div>
       <?php
       include 'conexion.php';
       ?>
       <!-- filtro -->
       <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="row center-align">
          <div class="input-gropu col s8">
            <select name="curso_selec">
              <option value="" disabled selected>Curso</option>
                 <?php
                    $reg = $base->query("SELECT * FROM cursos")->fetchAll(PDO::FETCH_OBJ);
                    foreach ($reg as $curso){        
                      echo "<option value='$curso->curso_nombre'>
                      $curso->curso_nombre
                      </option>";
                    }
                ?> 
            </select>
            <div>
              <button class="btn waves-effect waves-light green center section btn-small btn_f right" type="submit" name="filt">
                <i class="fas fa-search material-icons"></i>
              </button>
            </div>          
          </div>
        </div>
      </form>


      <?php
        if(isset($_POST['filt'])){
            $filtro='';
            $curso= (isset($_POST["curso_selec"]) && !empty($_POST["curso_selec"]))? $_POST["curso_selec"]:"";
                        
            if ($curso != "") {
                $filtro.= " WHERE c.curso_nombre = '$curso'";
            }
            
            $sql = ("SELECT * FROM cursos c JOIN preguntas p ON c.curso_cod= p.curso_cod $filtro ORDER BY c.curso_cod");

            $registros=$base->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }else {
          $registros = $base->query("SELECT * FROM cursos c JOIN preguntas p ON c.curso_cod= p.curso_cod ORDER BY c.curso_cod")->fetchAll(PDO::FETCH_OBJ);
        }
    ?>
      <div class="divider"></div>

       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post' id="faltap" onsubmit="validaPreg()">
       <table class='highlight centered responsive-table'>
          <thead>
            <tr>
              <th>Pregunta Numero</th>
              <th>Pregunta Descripcion</th>
               <th>Pregunta Tipo</th>
               <th>Curso</th>
            </tr>
          </thead>
          <tbody>
       <?php foreach ($registros as $preguntas): ?>    
        <tr>
            <td><?=$preguntas->preg_nro?></td>
            <td><?=$preguntas->preg_desc?></td>
            <td><?=$preguntas->preg_tipo?></td>
            <td><?=$preguntas->curso_nombre?></td>
            <td>
              <a data-position='left' data-tooltip='Borrar' class='white-text red waves-effect waves-light btn tooltipped'
               href='borrarpreg.php?id=<?php echo $preguntas->preg_nro;?>'>
               <i class="fas fa-trash-alt material-icons"></i></a></td>
               <td>
               <a data-position="right" data-tooltip="Editar" class="white-text yellow darken-4 waves-effect waves-light btn tooltipped"
                href="editarpreg.php?id=<?php echo $preguntas->preg_nro;?>&desc=<?php echo  $preguntas->preg_desc; ?>&tipo=<?php echo $preguntas->preg_tipo; ?>&cur=<?php echo $preguntas->curso_cod; ?>"
                ><i class="fas fa-edit material-icons"></i></a>
            </td>
   

        </tr>
        <?php endforeach; ?>
       
                
        <tr>
          <td></td>
          <td><input type='text' name='desc' id="desc" required></td>
          <td>
            <select name="tipo" required>
              <option value='' disabled selected>Tipo</option>
              <option value='opciones'>Opciones</option>
              <option value='texto'>Texto</option>
              </select>
          </td>
          <td>
          <select name='curso' required>
            <option value="" disabled selected>Curso</option>
            <?php
              $reg = $base->query("SELECT * FROM cursos")->fetchAll(PDO::FETCH_OBJ);
              foreach ($reg as $curso){
            
               echo "<option value='$curso->curso_cod'>
                $curso->curso_nombre
              </option>";
              }
            ?>
          </select>
          
          </td>


          <td>
            <button data-position='right' data-tooltip='Agregar' class='green btn waves-effect waves-light tooltipped' type='submit' name='btn_preg'>
              <i class="far fa-share-square material-icons"></i>
            </button></td>
        </tr>
      </tbody>
    </table> 
    </form>
 
</main>

<?php include "footer.php" ?>
  <?=footer()?>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/script-modificado.js"></script>


</body>
</html>




