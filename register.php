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
  
  <script defer src="js/all.js"></script> 
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
    <main>
    <div class="row container section">
        <h1 class="center">Registrarse</h1>
        <form class="col s12" action="datosreg.php" method="POST" id="formulario">
            <div class="row">
                <div class="input-field col s6">
                    <i class="fas fa-user-circle material-icons prefix"></i>
                    <input id="nombre" type="text" class="validate" name="nombre" data-length="25" required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix fas fa-user-circle"></i>
                    <input id="apellido" type="text" class="validate" name="apellido" data-length="25" required>
                    <label for="apellido">Apellido</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix fas fa-id-card"></i>
                    <input id="dni" type="number" class="validate" name="dni" data-length="8" maxlength="8" required>
                    <label for="dni">DNI</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix fas fa-phone"></i>
                    <input id="tel" type="number" class="validate" name="tel" data-length="15" required>
                    <label for="tel">Teléfono</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix fas fa-at"></i>
                    <input id="email" type="email" class="validate" name="email" required>
                    <span class="helper-text" data-error="Incorrecto" data-success="Correcto"></span>
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix fas fa-key"></i>
                    <input id="pass" type="password" class="validate" name="pass" required>
                    <label for="pass">Contraseña</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <a class="btn waves-effect waves-light left" href="index.php">
                        <i class="fas fa-chevron-left"></i>
                        Volver
                    </a>
                    <button class="btn waves-effect waves-light right" type="submit" name="btn_reg">Registrar
                    <i class="fas fa-sign-out-alt"></i>
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
    
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>