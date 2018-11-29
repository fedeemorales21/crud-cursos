<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <title>Cursos</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
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
      if(!isset($_SESSION))
      {
      session_start();
      }
      //session_start();
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
          <a>&nbsp;</a>
        </div>
      </div>";
      }    
      }else {
        $num=$_SESSION['numid'];
        $registros = $base->query("SELECT * FROM cursos WHERE curso_cod NOT IN (SELECT curso_nro FROM curso_alumno WHERE alumno_nro = $num)")->fetchAll(PDO::FETCH_OBJ);
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
              <a class='white-text waves-effect waves-light btn orange lighten-1 pulse' href='inscrip.php?id=$curso->curso_cod&us=$num'>Inscribirse</a>
            </div>
          </div>";
        }      
      }
      else {
        echo "<div class='amber lighten-5 container section'><h5 class='center'><i class='fas fa-exclamation-circle fa-2x'></i> No tiene cursos para inscribirse.</h5></div>";
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