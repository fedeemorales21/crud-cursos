<?php
    if(isset($_SESSION)) { 
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
    <?php
    include 'conexion.php';
    $registros = $base->query("SELECT * FROM cursos")->fetchAll(PDO::FETCH_OBJ);
    
    $prof=$_SESSION["nombre"];
    if (isset($_POST['btn_cur'])) {
        $err=0;
        $nombre=( isset($_POST['nom']) && !empty($_POST['nom']) )? htmlentities(addslashes($_POST["nom"])):$err++;
        $desc=( isset($_POST['desc']) && !empty($_POST['desc']) )? htmlentities(addslashes($_POST["desc"])):$err++;
        $fecha=( isset($_POST['fecha']) && !empty($_POST['fecha']) )? htmlentities(addslashes($_POST["fecha"])):$err++;

        if ($err==0) {
            $sql="INSERT INTO cursos (curso_nombre,curso_profesor,curso_desc,curso_fecha) VALUES(:nom,:prof,:descr,:fecha)";
            $resultado= $base->prepare($sql);
            $resultado->execute(array(":nom"=>$nombre,":prof"=>$prof,":descr"=>$desc,":fecha"=> $fecha));
            header("Location:altacurso.php");
        }
    }
    ?>
    <main>
     <h1 class="center">Administración de cursos</h1>
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="faltac">

    <div class="container">
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

                <td><a data-position="left" data-tooltip="Borrar" class="white-text red waves-effect waves-light btn tooltipped" href="borrarcurso.php?id=<?php echo $cursos->curso_cod;?>"><i class="fas fa-trash-alt material-icons"></i></a></td>
                <td><a data-position="right" data-tooltip="Editar" class="white-text yellow darken-4 waves-effect waves-light btn tooltipped" href="editarcurso.php?id=<?php echo $cursos->curso_cod; ?>&nom=<?php echo $cursos->curso_nombre; ?>&prof=<?php echo $cursos->curso_profesor; ?>&desc=<?php echo $cursos->curso_desc; ?>&fec=<?php echo $cursos->curso_fecha;?>"><i class="fas fa-edit material-icons"></i></a></td>
            </tr>
        <?php endforeach; ?>


        <tr>
            <td></td>
            <td><input type='text' id="nombre" name='nom' requied ></td>
            <td><input type='text' value="<?php echo $prof; ?>" disabled></td>
            <td><input type='text' id="desc" name='desc' requied></td>
            <td><input type="text" id="fecha" class="datepicker" name='fecha'></td>
            <td>
                <button data-position="right" data-tooltip="Agregar" class="green btn waves-effect waves-light tooltipped" type="submit" name="btn_cur">
                    <i class="far fa-share-square material-icons"></i>
                </button>
            </td>
        </tr>
    </tbody>
    </table>

    </div>
    <p>&nbsp;</p>
    </main>

  <?php include "footer.php" ?>
  <?=footer()?>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>

</body>
</html>
