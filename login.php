<?php
    // if(!isset($_SESSION)) { 
    //     session_start();
    //     if ($_SESSION['nombre']!='') {
    //             header("location:index.php");
    //     }
    // }     
?>
  <!DOCTYPE html>
  <html>

        <head>
             <!--Import Google Icon Font-->
                <title>Login</title>
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
            <main class="row container section">
                <h1 class="center">Log In</h1>
                <form class="col s12" action="datoslog.php" method="POST" id="flog">
                <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="login" type="email" class="validate" name="login" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="pw" type="password" class="validate" name="pw" required>
                            <label for="pass">Contraseña</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <a class="btn waves-effect waves-light left" href="index.php">
                                <i class="material-icons left">undo</i>
                                Volver
                            </a>
                            <button class="btn waves-effect waves-light right" type="submit" name="enviar">Entrar
                                <i class="material-icons right">redo</i>
                            </button>
                        </div>
                    </div>
                </form>
            </main>

            <?php include "footer.php" ?>
            <?=footer()?>

            <!--JavaScript at end of body for optimized loading-->
            <script type="text/javascript" src="js/materialize.min.js"></script>
            <script type="text/javascript" src="js/script.js"></script>

        </body>
   </html>