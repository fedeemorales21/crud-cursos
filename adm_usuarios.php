<?php
    if(!isset($_SESSION)) { 
        session_start();
        if ($_SESSION['perfil']!='a') {
            header("location:index.php");
        }
    }    
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Administrar Usuarios</title>
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
    <?php
    include 'conexion.php';
    $registros = $base->query("SELECT * FROM personas")->fetchAll(PDO::FETCH_OBJ);
    
    if (isset($_POST['brn_per'])) {
        $nombre=$_POST["nom"];
        $apellido=$_POST["ape"];
        $dni=$_POST["dni"];
        $tel=$_POST["tel"];
        $email=$_POST["email"];
        $pass=password_hash($_POST["pass"],PASSWORD_DEFAULT);
        $tipo=$_POST["tipo"];

        $sql="INSERT INTO pesonas (nombre,apellido,dni,telefono,email,pass,tipo) VALUES(:nom,:ape,:dni,:tel,:email,:pass,:tipo)";
        $resultado= $base->prepare($sql);
        $resultado->execute(array(":nom"=>$nombre,":ape"=>$apellido,":dni"=>$dni,":tel"=>$tel,":email"=>$email,":pass"=>$pass,":tipo"=>$tipo));
        header("Location:adm_usuarios.php");
    }
    ?>

    <h1 class="center">Administración de usuarios</h1>
    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="container">
    <table class="highlight centered responsive-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>E-mail</th>
                <th>Tipo</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($registros as $usuario) :?>
            <tr>
                <td><?php echo $usuario->cod_persona; ?></td>
                <td><?php echo $usuario->nombre; ?></td>
                <td><?php echo $usuario->apellido; ?></td>
                <td><?php echo $usuario->dni; ?></td>
                <td><?php echo $usuario->telefono; ?></td>
                <td><?php echo $usuario->email; ?></td>
                <td><?php if($usuario->tipo == 'g'){echo "Alumno";}elseif($usuario->tipo == 'p'){echo "Profesor";}elseif($usuario->tipo == 'a'){echo "Administrador";} ?></td>

                <td><a data-position="left" data-tooltip="Borrar" class="white-text red waves-effect waves-light btn tooltipped" href="borraruser.php?id=<?php echo $usuario->cod_persona;?>"><i class="material-icons ">delete</i></a></td>
                <td><a data-position="right" data-tooltip="Editar" class="white-text yellow darken-4 waves-effect waves-light btn tooltipped" href="editaruser.php?id=<?php echo $usuario->cod_persona; ?>&nom=<?php echo  $usuario->nombre; ?>&ape=<?php echo $usuario->apellido; ?>&dni=<?php echo $usuario->dni; ?>&tel=<?php echo $usuario->telefono; ?>&mail=<?php echo $usuario->email; ?>&tipo=<?php echo $usuario->tipo; ?>"><i class="material-icons ">edit</i></a></td>
            </tr>
        <?php endforeach; ?>


        <tr>
            <td></td>
            <td><input type='text' name='nom' requied placeholder="Nombre"></td>
            <td><input type='text' name='ape' requied placeholder="Apellido"></td>
            <td><input type='text' name='dni' requied placeholder="DNI"></td>
            <td><input type='text' name='tel' requied placeholder="Teléfono" ></td>
            <td><input type='text' name='email' requied placeholder="E-mail" ></td>
            <td><input type='text' name='pass' requied placeholder="Password" ></td>
            <td><select>
                    <option value="" disabled selected>Tipo</option>
                    <option value="g">Alumno</option>
                    <option value="p">Profesor</option>
                    <option value="a">Administrador</option>
                </select>
            </td>
           
            <td>
                <button data-position="right" data-tooltip="Agregar" class="green btn waves-effect waves-light tooltipped" type="submit" name="action">
                    <i class="material-icons">send</i>
                </button>
            </td>
        </tr>
    </tbody>
    </table>
    </div>
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
