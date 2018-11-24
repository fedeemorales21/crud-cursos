<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacto</title>
</head>

<body>
  <?php include "navbar.php"; ?>
  <?=$nav?>

  <main class="container">
    

    <div class="row">
        <!-- faq -->
        <div class="col s12 m6 align-center">
            <h2 class="center-align section">FAQ</h2>
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
            </ul>
        </div>
        <!-- formulario -->
        <div class="col s12 m6">
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
            $texto=$_POST["comentarios"];
            $emisor=$_POST["email"];
            $asunto=$_POST["asunto"];
            $nombre=$_POST["nombre"];
            $destinatario='federicomorales@gmail.com';

            $exito = email($destinatario,$asunto,$texto,$header); 

            if ($exito) {
                echo "<p>Mensaje enviado</p>";
            }else {
                echo "<p>Mensaje NO enviado</p>";
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
  
</body>

</html>