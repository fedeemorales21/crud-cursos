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
    <?php include 'conexion.php';?>
  <main class="container section">
    <h1 class="center-align section">Reporte</h1>

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
                </div>
                

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
                </div>
                <div class="input-field col s3">
                    <input type="text" class="datepicker" placeholder="Fecha" name="fecha">
                </div>
                <div class=" col s2">
                    <p>
                        <label>
                            <input name="ord" type="radio" value='curso_fecha' />
                            <span>Fecha</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="ord" type="radio" value="curso_profesor" />
                            <span>Profesor</span>
                        </label>
                    </p>
                </div>
                      <p><button class="btn waves-effect waves-light green center section btn-small" type="submit" name="filt">
                            <i class="material-icons ">send</i>
                        </button></p>
            </div>
         
        </form>
    </div>
    
    <?php
        if(isset($_POST['filt'])){
            $filtro='';
            
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
                $filtro.= " AND c.curso_fecha = $fecha";
            }

            if ($ord != "") {
                $filtro.= " ORDER BY  $ord";
            }

            $sql="SELECT DISTINCT p.preg_desc AS preg,c.curso_nombre AS cur,c.curso_profesor AS prof,c.curso_fecha AS fecha, COUNT(e.preg_nro) AS cant
            FROM preguntas p JOIN cursos c ON (p.curso_cod = c.curso_cod) JOIN encuesta e ON (c.curso_cod=e.curso_cod)
            WHERE p.preg_nro= e.preg_nro GROUP BY e.preg_nro".$filtro;

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
              <!-- <th>Excelente</th>
              <th>Muy Bueno</th>
              <th>Bueno</th>
              <th>Regular</th>             
              <th>Malo</th> -->
          </tr>
        </thead>

        <tbody>
        <?php
            
            

            // $registros=$base->query("SELECT DISTINCT p.preg_desc AS preg,c.curso_nombre AS cur, e.rta resp, e.observacion obs
            // FROM preguntas p JOIN cursos c ON (p.curso_cod = c.curso_cod) 
            // JOIN encuesta e ON (c.curso_cod=e.curso_cod AND p.preg_nro= e.preg_nro)
            // LEFT JOIN tipo_pregunta tp ON (e.rta = tp.tipopreg_cod) WHERE e.rta IS NOT NULL")->fetchAll(PDO::FETCH_OBJ);

            // $ex = 0;
            // $mb = 0;
            // $bn = 0;
            // $re = 0;
            // $ma = 0;
        ?>
            <?php foreach ($registros as $res) : ?>
                <tr>
                    <td><?= $res->preg?></td>
                    <td><?= $res->cur ?></td>
                    <td><?= $res->prof ?></td>
                    <td><?= $res->fecha ?></td>
                    <td><?= $res->cant ?></td>
           
                    <!-- <td><?php //if($res->resp == '1') {$ex++;} echo $ex; ?></td>
                    <td><?php //if($res->resp == '2') {$mb++;} echo $mb; ?></td>
                    <td><?php //if($res->resp == '3') {$bn++;} echo $bn; ?></td>
                    <td><?php //if($res->resp == '4') {$re++;} echo $re; ?></td>
                    <td><?php //if($res->resp == '5') {$ma++;} echo $ma; ?></td> -->
                </tr>
            <?php endforeach?>
        </tbody>
      </table>
    <div id="imp">
      <div class="fixed-action-btn">
            <a class="btn-floating btn-large red">
            <i class="fas fa-print"></i>
        </a>
        <ul>
            <li><a class="btn-floating green tooltipped" data-position="left" data-tooltip="Exel" onclick="reporteExcel();">
            <i class="fas fa-file-csv"></i></a></li>
            <li><a class="btn-floating blue tooltipped" data-position="left" data-tooltip="PDF" href="javascript:window.print();"><i class="far fa-file-pdf"></i></a></li>
        </ul>
    </div>
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

     function reporteExcel(){
            var texto="<table border='1'><tr>"
            var tabla = document.getElementById('tabla')

            for(let i = 0 ; i < tabla.rows.length ; i++){     
                texto+=tabla.rows[i].innerHTML+"</tr>"
                texto+="</tr>"
            }
             
            render = window.open('data:application/vnd.ms-excel,' + encodeURI(texto))

            return render
        }

  </script>
  
</body>

</html>