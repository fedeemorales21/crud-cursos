<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <title>Encuestas</title>
  <script src="js/all.js"></script>
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

  <?php include "navbar.php"; ?>
  <?=$nav?>

  <main class="container">
    <h1 class="center-align">Mis Cursos</h1>

    <?php
      include 'conexion.php';
      if(!isset($_SESSION))
      {
      session_start();
      }
      if (isset($_SESSION['numid'])) {
        $num=$_SESSION['numid'];
        $registros = $base->query("SELECT * FROM cursos c WHERE c.curso_cod NOT IN (SELECT DISTINCT(curso_nro) FROM curso_alumno ca JOIN encuesta e ON (ca.curso_nro = e.curso_cod) WHERE e.alumno_nro=$num) AND c.curso_cod IN (SELECT DISTINCT(curso_cod) FROM curso_alumno ca WHERE ca.alumno_nro = $num)")->fetchAll(PDO::FETCH_OBJ);
        if (!empty($registros)) {
          foreach ($registros as $curso) {
      
            echo "<div class='card white hoverable'>
              <div class='card-content '>
              <span class='card-title indigo-text'>$curso->curso_nombre</span>
              <p>$curso->curso_desc</p>
              <p>$curso->curso_profesor</p>
              <p>$curso->curso_fecha</p>
              </div>
            <div class='card-action right-align'>
              <a class='teal-text' href='preguntas.php?id=$curso->curso_cod&us=$num'>Preguntas</a>
            </div>
          </div>";
        }
      }else {
        echo "<div class='amber lighten-5 container section'>
        <h5 class='center'><i class='fas fa-exclamation-circle fa-2x'></i> No tiene preguntas para responder.</h5>
        <h6 class='center'><a href='index.php'>Volver</a></h6>
        </div>";
        }        
      }else {
          header("Location:index.php");
      }
     
?>        

    

  </main>

  <?php include "footer.php" ?>
  <?=footer()?>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/script-modificado.js"></script>
  
  
</body>

</html>