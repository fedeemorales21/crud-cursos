<!DOCTYPE html>
<html lang='es'>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacto</title>
</head>

<body>
  <?php include "navbar.php"; ?>
  <?=$nav?>

  <main class="container">
    

    <div class="row">
        
        
        <!-- formulario -->
        <div class="col s12 ">
            <form action="contacto.php" method="post" class="align-center">
            <h2 class="center-align section">Escribinos</h2>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="nombre" type="text" class="validate" name="nombre" required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">help</i>
                    <input id="apellido" type="text" class="validate" name="asunto" required>
                    <label for="apellido">Asunto</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="email" class="validate" name="email" required>
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">chat_bubble</i>
                    <textarea id="icon_prefix2" class="materialize-textarea" name="comentarios" required></textarea>
                    <label for="icon_prefix2">Cometarios</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light right" type="submit" name="btn_con">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
            </form>
        
        </div>
    </div>
    
    <?php
        if(isset($_POST['btn_con'])){
            $err=0;
            $texto=( isset($_POST['comentarios']) && !empty($_POST['comentarios']) )? htmlentities(addslashes($_POST["comentarios"])):$err++;
            $emisor=( isset($_POST['email']) && !empty($_POST['email']) )? htmlentities(addslashes($_POST["email"])):$err++;
            $asunto=( isset($_POST['asunto']) && !empty($_POST['asunto']) )? htmlentities(addslashes($_POST["asunto"])):$err++;
            $nombre=( isset($_POST['nombre']) && !empty($_POST['nombre']) )? htmlentities(addslashes($_POST["nombre"])):$err++;
            $destinatario='federicomorales@gmail.com';

            if ($err==0) {
                
                $exito = email($destinatario,$asunto,$texto,$header); 
    
                if ($exito) {
                    echo "<p>Mensaje enviado</p>";
                }else {
                    echo "<p>Mensaje NO enviado</p>";
                }
            }
        }
        ?>

  </main>

  <?php include "footer.php" ?>
  <?=footer()?>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
     M.AutoInit();
  </script>
  <script src="js/script.js"></script>
  
</body>

</html>