

 <!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link rel="stylesheet" href="css/style.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ERROR</title>
</head>

<body>

  <?php include "navbar.php"; ?>
  <?=$nav?>

  <main class="container">
    
  <?php
  include 'conexion.php';
  $id = $_GET['id'];
  try {
    $base->query("DELETE FROM cursos WHERE curso_cod = '$id'");
    
    header('Location:altacurso.php');
   
    
  }  catch (\Exception $e) {
    echo "<div class='red section center-align'><h1 class='center white-text'>ERROR</h1>
    <br><h4 class='center white-text'>No siga intentando</h4>
    <a class='center' href='altacurso.php'><h3>Volver</h3></a></div>";
  }
 ?>
      

    

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