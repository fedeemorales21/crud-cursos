<?php 
    session_start();
    if (isset($_SESSION["nombre"])) {
       header("location:index.php");
     }
 ?>
  <!DOCTYPE html>
  <html>

        <head>
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!--Import materialize.css-->
            <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        </head>

        <body>
            <?php include "navbar.php"; ?>
            <?=$nav?>
            <div class="row container section">
                <form class="col s12" action="datoslog.php" method="POST">
                <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" class="validate" name="login" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="pass" type="password" class="validate" name="pw" required>
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
            </div>

            <?php include "footer.php" ?>
            <?=footer()?>

            <!--JavaScript at end of body for optimized loading-->
            <script type="text/javascript" src="js/materialize.min.js"></script>
        </body>
   </html>