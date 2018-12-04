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
    <span class="fechapdf center">Fecha de reporte <?php date_default_timezone_set('America/Argentina/Buenos_Aires');echo date("d/m/y"); ?></span>

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
                        <option value="<?php echo $filtroprof ?>" disabled selected>Profesor</option>
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
                            <input name="ord" type="radio" value='fecha' <?php if( isset($_POST['filt']) && isset($_POST['ord']) && $_POST['ord']=='fecha' ){echo "checked";} ?>/>
                            <span>Fecha</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="ord" type="radio" value="prof" <?php if( isset($_POST['filt']) && isset($_POST['ord']) && $_POST['ord']=='prof' ){echo "checked";} ?> />
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
        $base->prepare("SET @rta1 = :rta1, @rta2 = :rta2, @rta3 = :rta3, @rta4 = :rta4, @rta5 = :rta5")->execute(array(":rta1"=>0,":rta2"=>0,":rta3"=>0,":rta4"=>0,":rta5"=>0));
    
    ?>
    <?php
        if(isset($_POST['filt'])){
            $filtrocurs;
            $filtroprof='';
            $filtrocurs='';
            $filtrofech='';
            $orden='cur, preg';
            $profesor= (isset($_POST["profe"]) && !empty($_POST["profe"]))? $_POST["profe"]:"";
            $curso= (isset($_POST["curso"]) && !empty($_POST["curso"]))? $_POST["curso"]:"";
            $fecha= (isset($_POST["fecha"]) && !empty($_POST["fecha"]))? $_POST["fecha"]:"";
            $ord=(isset($_POST["ord"]) && !empty($_POST["ord"]))? $_POST["ord"]:"";

            if ($profesor != "") {
                $filtroprof.= " AND c.curso_profesor = '$profesor'";
            }
            if ($curso != "") {
                $filtrocurs.= " AND c.curso_nombre = '$curso'";
            }
            if ($fecha != "") {
                $filtrofech.= " AND c.curso_fecha = '$fecha'";
            }

            if ($ord != "") {
                $orden = "$ord, cur, preg";
            }

            $sql = "SELECT 
            DISTINCT p.preg_desc AS preg,
            c.curso_nombre AS cur,
            c.curso_profesor AS prof,
            DATE_FORMAT(c.curso_fecha,'%d/%m/%Y') AS fecha,
            '' texto,
            sum(case e.rta when 1 then @rta1 + 1 end) rta1,
            sum(case e.rta when 2 then @rta2 + 1 end) rta2,
            sum(case e.rta when 3 then @rta3 + 1 end) rta3,
            sum(case e.rta when 4 then @rta4 + 1 end) rta4,
            sum(case e.rta when 5 then @rta5 + 1 end) rta5
            FROM preguntas p JOIN cursos c ON (p.curso_cod = c.curso_cod) 
                JOIN encuesta e ON (c.curso_cod=e.curso_cod)
            WHERE p.preg_nro= e.preg_nro AND p.preg_tipo = 'opciones'$filtrocurs $filtroprof $filtrofech
            GROUP BY e.preg_nro, p.preg_desc, c.curso_nombre, c.curso_profesor, c.curso_fecha
            
            UNION
            
            SELECT 
            p.preg_desc AS preg,
            c.curso_nombre AS cur,
            c.curso_profesor AS prof,
            DATE_FORMAT(c.curso_fecha,'%d/%m/%Y') AS fecha,
            e.observacion as texto,
            0 rta1,
            0 rta2,
            0 rta3,
            0 rta4,
            0 rta5
            FROM preguntas p JOIN cursos c ON (p.curso_cod = c.curso_cod) 
                JOIN encuesta e ON (c.curso_cod=e.curso_cod)
            WHERE p.preg_tipo = 'texto'$filtrocurs $filtroprof $filtrofech
            ORDER BY $orden";

            $registros=$base->query($sql)->fetchAll(PDO::FETCH_OBJ);


        }else {
            $sql = "SELECT 
            DISTINCT p.preg_desc AS preg,
            c.curso_nombre AS cur,
            c.curso_profesor AS prof,
            DATE_FORMAT(c.curso_fecha,'%d/%m/%Y') AS fecha,
            '' texto,
            sum(case e.rta when 1 then @rta1 + 1 end) rta1,
            sum(case e.rta when 2 then @rta2 + 1 end) rta2,
            sum(case e.rta when 3 then @rta3 + 1 end) rta3,
            sum(case e.rta when 4 then @rta4 + 1 end) rta4,
            sum(case e.rta when 5 then @rta5 + 1 end) rta5
            FROM preguntas p JOIN cursos c ON (p.curso_cod = c.curso_cod) 
                JOIN encuesta e ON (c.curso_cod=e.curso_cod)
            WHERE p.preg_nro= e.preg_nro AND p.preg_tipo = 'opciones'
            GROUP BY e.preg_nro, p.preg_desc, c.curso_nombre, c.curso_profesor, c.curso_fecha
            
            UNION
            
            SELECT 
            p.preg_desc AS preg,
            c.curso_nombre AS cur,
            c.curso_profesor AS prof,
            DATE_FORMAT(c.curso_fecha,'%d/%m/%Y') AS fecha,
            e.observacion as texto,
            0 rta1,
            0 rta2,
            0 rta3,
            0 rta4,
            0 rta5
            FROM preguntas p JOIN cursos c ON (p.curso_cod = c.curso_cod) 
                JOIN encuesta e ON (c.curso_cod=e.curso_cod)
            WHERE p.preg_tipo = 'texto'
            ORDER BY cur, preg";


            $registros=$base->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }
    ?>
    <table  class="highlight centered" id="tabla">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Profesor</th>
                <th>Pregunta</th>
                <th>Respuesta escrita</th>
                <th>Excelente</th>
                <th>Muy Bueno</th>
                <th>Bueno</th>
                <th>Regular</th>
                <th>Malo</th>
                <th>Respondieron</th>
                <th>Fecha</th>
            </tr>
        </thead>

        <tbody>
        
            <?php foreach ($registros as $res) :?>
                <tr>
                    <?php 
                        $ex= $res->rta1;
                        $mb= $res->rta2;
                        $bn= $res->rta3;
                        $re = $res->rta4;
                        $ma= $res->rta5;

                        if($ex == null){$ex = 0;}
                        if($mb == null){$mb = 0;}
                        if($bn == null){$bn = 0;}
                        if($re == null){$re = 0;}
                        if($ma == null){$ma = 0;}

                        $sum=$ex+$mb+$bn+$re+$ma;
                     ?>
                    <td><?= $res->cur?></td>
                    <td><?= $res->prof ?></td>
                    <td><?= $res->preg ?></td>
                    <td><?php if($res->texto != ""){echo $res->texto;} ?></td>
                    <td><?= $ex ?></td>
                    <td><?= $mb ?></td>
                    <td><?= $bn ?></td>
                    <td><?= $re ?></td>
                    <td><?= $ma ?></td>
                    <td><?= $sum ?></td>
                    <td><?= $res->fecha ?></td>
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
    <!-- <script type="text/javascript" src="js/script.js"></script> -->
    <!-- <script >
        document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            format : "yyyy-mm-dd"
        });
    });
    </script> -->
    <script src="js/script-modificado.js"></script>
</body>

</html>