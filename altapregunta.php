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
<?php include "navbar.php"; ?>
  <?=$nav?>

<main class="container">
    <h1 class="center-align">Preguntas</h1>
       <?php
       include 'conexion.php';
       $registros = $base->query("SELECT * FROM preguntas")->fetchAll(PDO::FETCH_OBJ);
       ?>
       <form action='validar_preguntas.php' method='post'>
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
            <td><?=$preguntas->curso_cod?></td>
            <td>
              <a data-position='left' data-tooltip='Borrar' class='white-text red waves-effect waves-light btn tooltipped'
               href='borrarpreg.php?id=<?php echo $preguntas->preg_nro;?>'>
               <i class='material-icons'>delete</i></a></td>
               <td>
               <a data-position="right" data-tooltip="Editar" class="white-text yellow darken-4 waves-effect waves-light btn tooltipped"
                href="editarpreg.php?id=<?php echo $preguntas->preg_nro;?>&desc=<?php echo  $preguntas->preg_desc; ?>&tipo=<?php echo $preguntas->preg_tipo; ?>&cur=<?php echo $preguntas->curso_cod; ?>"
                ><i class="material-icons ">edit</i></a></td>
   

          </tr>
        <?php endforeach ?>
       
                
        <tr>
          <td></td>
          <td><input type='text' name='desc'></td>
          <td>
            <select>
              <option value='' disabled selected>Tipo</option>
              <option value='opc'>Opciones</option>
              <option value='txt'>Texto</option>
              </select>
          </td>
          <td><input type='text' name='curso'></td>
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




