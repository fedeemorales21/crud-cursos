<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>
<!-- navbar -->
  <div class="navbar-fixed ">
    <nav class="indigo">

      <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="login.php" class="waves-effect waves-light">Log In</a></li>
          <li><a href="register.php" class="waves-effect waves-light">Register</a></li>
        </ul>
      </div>

    </nav>
  </div>


  <main class="container">
    <h1 class="center-align">Cursos</h1>

    <?php
      include 'conexion.php';
      $registros = $base->query("SELECT * FROM cursos")->fetchAll(PDO::FETCH_OBJ);

      foreach ($registros as $curso) {
    
     	echo "<div class='card white hoverable my2'>
        <div class='card-content '>
        <span class='card-title indigo-text'>$curso->curso_nombre</span>
        <p>$curso->curso_desc</p>
        <p>$curso->curso_profesor</p>
        <p>$curso->curso_fecha</p>
        </div>
      <div class='card-action right-align'>
        <a href='preguntas.php/id=$curso->curso_cod'>Preguntas</a>
      </div>
    </div>";

    }    
     

?>    

    

  </main>

  <?php include "footer.php" ?>
  <?=footer()?>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  
</body>

</html>