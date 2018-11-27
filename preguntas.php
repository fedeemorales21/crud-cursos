<?php
    // if(!isset($_SESSION['nombre']) ) { 
    //     session_start();
        
    // }else {
    //     header("location:index.php");     
    // }
        
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

        <main class="container">
        
            <?php
                $cod=$_GET['id'];

                $sql="SELECT * FROM preguntas WHERE curso_cod=:id";
                $resultado=$base->prepare($sql);
                $resultado->execute(array(":id"=>$cod));


             ?>
            <h1 class="center section">Preguntas</h1>
            <form action="respuesta.php" method="post">
                <table>
                    <?php while ($registros=$resultado->fetch(PDO::FETCH_OBJ) ):?>
                    <tr>
                    <input type="hidden" name="p_nro" value="<?=$registros->preg_nro ?>">
                    <input type="hidden" name="p_desc" value="<?=$registros->preg_desc ?>">
                    <input type="hidden" name="p_tipo" value="<?=$registros->preg_tipo ?>">
                    <input type="hidden" name="p_curso" value="<?=$registros->curso_cod ?>">
                   

                    <td><?=$registros->preg_desc?></td>
                        <td><?php if ($registros->preg_tipo == 'texto'){
                            echo "<input type='text' name='rta'>";
                        }
                        else {
                        echo "
                        
                                <label>
                                    <input name='rta' type='radio' value='1' />
                                    <span>Excelente</span>
                                </label>
                            
                            
                                <label>
                                    <input name='rta' type='radio' value='2' />
                                    <span>Muy Bien</span>
                                </label>
                            
                            
                                <label>
                                    <input name='rta' type='radio' value='3' />
                                    <span>Bien</span>
                                </label>
                            
                            
                                <label>
                                    <input name='rta' type='radio' value='4' />
                                    <span>Regular</span>
                                </label>
                            
                            
                                <label>
                                    <input name='rta' type='radio' value='5' />
                                    <span>Malo</span>
                                </label>
                            
                            ";
                        } ?></td>
                    
                    </tr>
                    <?php endwhile; ?>
                    <tr>
                        <td>
                            <a href="miscursos.php" data-position="left" data-tooltip="Cancelar" class="red btn waves-effect waves-light tooltipped center" name="btn_can">
                                <i class="material-icons">close</i>
                            </a>
                        </td>
                        <td>
                            <button data-position="right" data-tooltip="Enviar" class=" right green btn waves-effect waves-light tooltipped" type="submit" name="btn_res">
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