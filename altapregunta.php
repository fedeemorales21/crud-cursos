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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link rel="stylesheet" href="css/style.css">
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
      $preg_desc = $_POST['desc'] ;
      $preg_tipo =  $_POST['tipo'] ;
      $preg_curso =  $_POST['curso'] ;

      $sql="INSERT INTO preguntas (preg_desc,preg_tipo,curso_cod) VALUES(:descr,:tipo,:curso)";
      $resultado= $base->prepare($sql);
      $resultado->execute(array(":descr"=>$preg_desc,":tipo"=>$preg_tipo,":curso"=>$preg_curso));
      header("Location:altapregunta.php");
    }
      
?>



<main class="container">
    <h1 class="center-align">Preguntas</h1>
       <?php
       include 'conexion.php';
       ?>
       <?php
       $registros = $base->query("SELECT * FROM cursos c JOIN preguntas p ON c.curso_cod= p.curso_cod")->fetchAll(PDO::FETCH_OBJ);
       ?>
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
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
               <i class='material-icons'>delete</i></a></td>
               <td>
               <a data-position="right" data-tooltip="Editar" class="white-text yellow darken-4 waves-effect waves-light btn tooltipped"
                href="editarpreg.php?id=<?php echo $preguntas->preg_nro;?>&desc=<?php echo  $preguntas->preg_desc; ?>&tipo=<?php echo $preguntas->preg_tipo; ?>&cur=<?php echo $preguntas->curso_cod; ?>"
                ><i class="material-icons ">edit</i></a>
            </td>
   

        </tr>
        <?php endforeach; ?>
       
                
        <tr>
          <td></td>
          <td><input type='text' name='desc'></td>
          <td>
            <select name="tipo">
              <option value='' disabled selected>Tipo</option>
              <option value='opciones'>Opciones</option>
              <option value='texto'>Texto</option>
              </select>
          </td>
          <td>
          <select name='curso'>
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
              <i class='material-icons'>send</i>
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
  <script>
     M.AutoInit();
  </script>

</body>
</html>




