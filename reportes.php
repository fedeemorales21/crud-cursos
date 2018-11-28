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
    <h1 class="center-align section">Reporte</h1>

    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
            <div class="row">
                <h5 class="center-align section">Filtrar por:</h5>
                <div class="input-field col s4">
                    <select>
                        <option value="" disabled selected>Curso</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
                <div class="input-field col s4">
                    <input type="text" class="datepicker" placeholder="Fecha">
                </div>

                <div class="input-field col s4">
                <select>
                        <option value="" disabled selected>Profesor</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <h5 class="center-align section">Ordenar por:</h5>
                <div class="center-align col s12">
                
                    
                        <label>
                            <input name="ord" type="radio"  />
                            <span>Red</span>
                        </label>
                    
                    
                        <label>
                            <input name="ord" type="radio" />
                            <span>Yellow</span>
                        </label>
                    
                    
                </div>
            </div>
        </form>
    </div>
    
    
    <table class="highlight centered">
        <thead>
          <tr>
              <th>Pregunta</th>
              <th>Curso</th>
              <th>Cantidad de  Respuestas</th>
          </tr>
        </thead>

        <tbody>
        <?php
            include 'conexion.php';
            $registros=$base->query("SELECT DISTINCT p.preg_desc AS preg,c.curso_nombre AS cur, COUNT(e.preg_nro) AS cant FROM preguntas p JOIN cursos c ON (p.curso_cod = c.curso_cod) JOIN encuesta e ON (c.curso_cod=e.curso_cod) WHERE p.preg_nro= e.preg_nro GROUP BY e.preg_nro")->fetchAll(PDO::FETCH_OBJ);
            
        ?>
            <?php foreach ($registros as $res) : ?>
                <tr>
                    <td><?=$res->preg?></td>
                    <td><?=$res->cur ?></td>
                    <td><?=$res->cant?></td>
                </tr>
            <?php endforeach?>
        </tbody>
      </table>
    
      <div class="fixed-action-btn">
            <a class="btn-floating btn-large red">
            <i class="fas fa-print"></i>
        </a>
        <ul>
            <li><a class="btn-floating green"><i class="fas fa-file-csv"></i></a></li>
            <li><a class="btn-floating blue"><i class="far fa-file-pdf"></i></a></li>
        </ul>
    </div>
 

            

    

  </main>

  <?php include "footer.php" ?>
  <?=footer()?>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            format : "yyyy-mm-dd"
        });
     });

     M.AutoInit();
  </script>
  
</body>

</html>