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

</head>

<body>

  <?php include "navbar.php"; ?>
  <?=$nav?>

  <main class="container">
    <h1 class="center-align">Cursos</h1>

    <?php
      include 'conexion.php';
      session_start();
      if (!isset($_SESSION['numid'])) {
         $registros = $base->query("SELECT * FROM cursos")->fetchAll(PDO::FETCH_OBJ);
        foreach ($registros as $curso) {
      
        echo "<div class='card white hoverable'>
          <div class='card-content '>
          <span class='card-title indigo-text'>$curso->curso_nombre</span>
          <p>$curso->curso_desc</p>
          <p>$curso->curso_profesor</p>
          <p>$curso->curso_fecha</p>
          </div>
        <div class='card-action right-align'>
          <a class='teal-text' href='preguntas.php?id=$curso->curso_cod'>Preguntas</a>
        </div>
      </div>";
      }    
      }else {
        $num=$_SESSION['numid'];
        $registros = $base->query("SELECT * FROM cursos WHERE curso_cod NOT IN (SELECT curso_nro FROM curso_alumno WHERE alumno_nro = $num)")->fetchAll(PDO::FETCH_OBJ);
        foreach ($registros as $curso) {
      
        echo "<div class='card white hoverable'>
          <div class='card-content '>
          <span class='card-title indigo-text'>$curso->curso_nombre</span>
          <p>$curso->curso_desc</p>
          <p>$curso->curso_profesor</p>
          <p>$curso->curso_fecha</p>
          </div>
        <div class='card-action right-align'>
          <a class='teal-text' href='preguntas.php?id=$curso->curso_cod'>Preguntas</a>
          <a class='white-text waves-effect waves-light btn orange lighten-1 pulse' href='inscrip.php?id=$curso->curso_cod&us=$num'>Inscribirse</a>
        </div>
      </div>";
      }
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