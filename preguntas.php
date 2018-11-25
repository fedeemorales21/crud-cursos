<?php
    if(isset($_SESSION)) { 
        session_start();
        if ($_SESSION['perfil']!='g') {
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
        <link rel="stylesheet" href="css/style.css">

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Preguntas</title>
    </head>
    <body>
        <?php
            include "conexion.php";
            include "navbar.php";
        ?>
        <?=$nav?>

        <main>
        
            <?php
                $cod=$_GET['id'];
                $registros = $base->prepare("SELECT * FROM preguntas WHERE curso_cod=:id")->fetchAll(PDO::FETCH_OBJ);
                
                $registros->execute(array(":id"=>$id));
             ?>

            <form action="" method="post">
                <table>
                    <?php foreach ($registros as $preguntas):?>
                    <tr>
                    <td><?=$preguntas->preg_desc?></td>
                        <td><?php if ($preguntas->preg_tipo == 'texto'){
                            echo "<input type='text' name='rta'>";
                        }
                        else {
                        echo "
                        <p>
                                <label>
                                    <input name='rta' type='radio'/>
                                    <span>Excelente</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input name='rta' type='radio'/>
                                    <span>Muy Bien</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input name='rta' type='radio'/>
                                    <span>Bien</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input name='rta' type='radio'/>
                                    <span>Regular</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input name='rta' type='radio'/>
                                    <span>Malo</span>
                                </label>
                            </p>
                            ";
                        } ?></td>
                    
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td>
                            <button data-position="right" data-tooltip="Enviar" class="green btn waves-effect waves-light tooltipped" type="submit" name="btn_res">
                                <i class="material-icons">send</i>
                            </button>
                        </td>
                    </tr>

                </table>
            
                
            
            </form>
        
        
        
        
        
        
        </main>
        <?php include "footer.php"; ?>
        <?=footer()?>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
        M.AutoInit();
    </script>
    </body>
</html>