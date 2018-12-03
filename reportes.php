<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <title>Reportes</title>
  
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
    <?php include 'conexion.php';?>
<main class="container section">
    <h1 class="center-align section">Reporte</h1>
    <span class="fechapdf center">Fecha de reporte <?php date_default_timezone_set('UTC');echo date("d/m/y"); ?></span>

    <div class="container " id="filtros">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
            <div class="row">
                <h5 class="left-align section col s12">Filtrar por:</h5>
                <div class="input-field col s3">
                        
                    <select name="curso">
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
                </div><!-- fincurso -->
                

                <div class="input-field col s3">
                    <select name='profe'>
                        <option value="" disabled selected>Profesor</option>
                        <?php
                        $reg = $base->query("SELECT * FROM cursos")->fetchAll(PDO::FETCH_OBJ);
                        foreach ($reg as $curso){
                        
                        echo "<option value='$curso->curso_profesor'>
                            $curso->curso_profesor
                        </option>";
                        }
                        ?>
                    </select>
                </div><!-- finprof -->
                <div class="input-field col s3">
                    <input type="text" class="datepicker" placeholder="Fecha" name="fecha" value="<?php if( isset($_POST['filt']) && isset($_POST['fecha']) ){echo $_POST['fecha'];} ?>" >
                </div>
                <div class="col s2">
                    <p>
                        <label>
                            <input name="ord" type="radio" value='c.curso_fecha' />
                            <span>Fecha</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="ord" type="radio" value="c.curso_profesor" />
                            <span>Profesor</span>
                        </label>
                    </p>
                </div><!-- fin ord -->
                      <p><button class="btn waves-effect waves-light green center section btn-small btn_f" type="submit" name="filt">
                        <i class="fas fa-search material-icons"></i></button></p>
            </div>  <!--  fin row -->
         
        </form>
    </div><!-- finfiltros -->
    <?php
        if(isset($_POST['filt'])){
            $filtro='';
            $orden='';
            $profesor= (isset($_POST["profe"]) && !empty($_POST["profe"]))? $_POST["profe"]:"";
            $curso= (isset($_POST["curso"]) && !empty($_POST["curso"]))? $_POST["curso"]:"";
            $fecha= (isset($_POST["fecha"]) && !empty($_POST["fecha"]))? $_POST["fecha"]:"";
            $ord=(isset($_POST["ord"]) && !empty($_POST["ord"]))? $_POST["ord"]:"";

            if ($profesor != "") {
                $filtro.= " AND c.curso_profesor = '$profesor'";
            }
            if ($curso != "") {
                $filtro.= " AND c.curso_nombre = '$curso'";
            }
            if ($fecha != "") {
                $filtro.= " AND c.curso_fecha = '$fecha'";
            }

            if ($ord != "") {
                $orden.= " ORDER BY $ord";
            }

            $sql="SELECT DISTINCT p.preg_desc AS preg,c.curso_nombre AS cur,c.curso_profesor AS prof,c.curso_fecha AS fecha, COUNT(e.preg_nro) AS cant
            FROM preguntas p JOIN cursos c ON (p.curso_cod = c.curso_cod) JOIN encuesta e ON (c.curso_cod=e.curso_cod)
            WHERE p.preg_nro= e.preg_nro $filtro GROUP BY e.preg_nro $orden";

            $registros=$base->query($sql)->fetchAll(PDO::FETCH_OBJ);


        }else {
            $registros=$base->query("SELECT DISTINCT p.preg_desc AS preg,c.curso_nombre AS cur,c.curso_profesor AS prof,c.curso_fecha AS fecha, COUNT(e.preg_nro) AS cant
            FROM preguntas p JOIN cursos c ON (p.curso_cod = c.curso_cod) JOIN encuesta e ON (c.curso_cod=e.curso_cod)
             WHERE p.preg_nro= e.preg_nro GROUP BY e.preg_nro")->fetchAll(PDO::FETCH_OBJ);
        }
    ?>
    <table  class="highlight centered" id="tabla">
        <thead>
          <tr>
              <th>Pregunta</th>
              <th>Curso</th>
              <th>Profesor</th>
              <th>Fecha</th>
              <th>Cantidad de Respuestas</th>
            </tr>
        </thead>

        <tbody>
        
            <?php foreach ($registros as $res) : ?>
                <tr>
                    <td><?= $res->preg?></td>
                    <td><?= $res->cur ?></td>
                    <td><?= $res->prof ?></td>
                    <td><?= $res->fecha ?></td>
                    <td><?= $res->cant ?></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
        <div id="imp">
            <div class="fixed-action-btn">
                    <a class="btn-floating btn-large red"><i class="fas fa-print fa-lg"></i></a>
                    <ul>
                        <li><a class="btn-floating green tooltipped" data-position="left" data-tooltip="Excel" onclick="reporteExcel();"><i class="fas fa-file-csv fa-lg"></i></a></li>
                        <li><a class="btn-floating blue tooltipped" data-position="left" data-tooltip="Imprimir" href="javascript:window.print();"><i class="fa-lg far fa-file-pdf"></i></a></li>
                    </ul>
            </div>
        </div>
    

</main>

  <?php include "footer.php" ?>
  <?=footer()?>

  <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script >
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            format : "yyyy-mm-dd"
        });
    });
    </script>
</body>

</html>