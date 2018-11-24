<?php
    if(!isset($_SESSION)) { 
        session_start();
        if ($_SESSION['perfil']!='p') {
            header("location:index.php");
        }
    }    
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registrar cursos</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    </head>

 <!-- arreglar insert ,controles -->
<body>

    <?php include "navbar.php"; ?>
    <?=$nav?>
    <?php
    include 'conexion.php';
    $registros = $base->query("SELECT * FROM cursos")->fetchAll(PDO::FETCH_OBJ);
    
    $prof=$_SESSION["nombre"];
    if (isset($_POST['brn_cur'])) {
        $nombre=$_POST["nom"];
        $desc=$_POST["desc"];
        $fecha=$_POST["fecha"];

        $sql="INSERT INTO cursos (curso_nombre,curso_profesor,curso_desc,curso_fecha) VALUES(:nom,:prof,:descr,:fecha)";
        $resultado= $base->prepare($sql);
        $resultado->execute(array(":nom"=>$nombre,":prof"=>$prof,":descr"=>$desc,":fecha"=> $fecha));
        header("Location:index.php");
    }
    ?>

    <h1 class="center">Administración de cursos</h1>
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


    <table class="highlight centered responsive-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Profesor</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($registros as $cursos) :?>
            <tr>
                <td><?php echo $cursos->curso_cod; ?></td>
                <td><?php echo $cursos->curso_nombre; ?></td>
                <td><?php echo $cursos->curso_profesor; ?></td>
                <td><?php echo $cursos->curso_desc; ?></td>
                <td><?php echo $cursos->curso_fecha; ?></td>

                <td><a data-position="left" data-tooltip="Borrar" class="white-text red waves-effect waves-light btn tooltipped" href="borrarcurso.php?id=<?php echo $cursos->curso_cod;?>"><i class="material-icons ">delete</i></a></td>
                <td><a data-position="left" data-tooltip="Editar" class="white-text yellow darken-4 waves-effect waves-light btn tooltipped" href="editarcurso.php?id=<?php echo $cursos->curso_cod; ?>&nom=<?php echo $personas->nombre; ?>&ape=<?php echo $personas->apellido; ?>&dir=<?php echo $personas->direccion; ?>"><i class="material-icons ">edit</i></a></td>
            </tr>
        <?php endforeach; ?>


        <tr>
            <td></td>
            <td><input type='text' name='nom' requied ></td>
            <td><input type='text' value="<?php echo $prof; ?>" disabled></td>
            <td><input type='text' name='desc' requied></td>
            <td><input type="text" class="datepicker" name='fecha'></td>
            <td>
                <button data-position="right" data-tooltip="Agregar" class="green btn waves-effect waves-light tooltipped" type="submit" name="action">
                    <i class="material-icons">send</i>
                </button>
            </td>
        </tr>
    </tbody>
    </table>
    </form>
    <p>&nbsp;</p>

  <?php include "footer.php" ?>
  <?=footer()?>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
     M.AutoInit();
  </script>
</body>
</html>
