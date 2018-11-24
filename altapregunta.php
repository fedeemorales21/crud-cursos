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
       $tablaP = "<table>
                        <thead>
                        <tr>
                            <th>Pregunta Numero</th>
                            <th>Pregunta Descripcion</th>
                            <th>Pregunta Tipo</th>
                            <th>Curso</th>
                        </tr>
                        </thead>
                        <tbody>";
       foreach ($registros as $preguntas) {     
          $tablaP .= "<tr>
            <td>$preguntas->preg_nro</td>
            <td>$preguntas->preg_desc</td>
            <td>$preguntas->preg_tipo</td>
            <td>$preguntas->curso_cod</td>
          </tr>";
       
        }        
        $tablaP .= "<tr><form action='validar_preguntas.php' method='post'>
                    <td><input type='text' name='desc'></td>
                    <td><input type='text' name='tipo'></td>
                    <td><input type='text' name='curso'></td>
                    <td><input type='submit' name='btn_preg'></td>
                    </form></tr></tbody></table>"; 
        echo $tablaP;
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




