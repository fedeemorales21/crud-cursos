<?php
    // if(!isset($_SESSION)) { 
    //     session_start();
    //     if ($_SESSION['nombre']!='') {
    //         header("location:index.php");
    //     }
    // }    
?>
<!DOCTYPE html>
<html>

<head>
     <!--Import Google Icon Font-->
     <title>Registrarse</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <?php include "navbar.php"; ?>
    <?=$nav?>
    <main>
    <div class="row container section">
        <h1 class="center">Registrarse</h1>
        <form class="col s12" action="datosreg.php" method="POST">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="nombre" type="text" class="validate" name="nombre" required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="apellido" type="text" class="validate" name="apellido" required>
                    <label for="apellido">Apellido</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input id="dni" type="text" class="validate" name="dni" required>
                    <label for="dni">DNI</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">phone</i>
                    <input id="tel" type="text" class="validate" name="tel" required>
                    <label for="tel">Teléfono</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="email" class="validate" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input id="pass" type="password" class="validate" name="pass" required>
                    <label for="pass">Contraseña</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <a class="btn waves-effect waves-light left" href="index.php">
                        <i class="material-icons left">undo</i>
                        Volver
                    </a>
                    <button class="btn waves-effect waves-light right" type="submit" name="btn_reg">Registrar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    </main>
    <?php include "footer.php" ?>
    <?=footer()?>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>