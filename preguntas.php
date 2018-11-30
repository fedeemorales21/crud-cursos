<?php
    // if(!isset($_SESSION['numid']) ) { 
    //     session_start();
        
    // }else {
    //     header("location:index.php");     
    // }
        
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <!--Import Google Icon Font-->
        <title>Preguntas</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
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
                $alu=$_GET['us'];
                $sql="SELECT * FROM preguntas p JOIN cursos c ON (p.curso_cod=c.curso_cod) JOIN curso_alumno a ON (a.curso_nro=c.curso_cod) WHERE c.curso_cod =:cur AND a.alumno_nro=:alu";
                $resultado=$base->prepare($sql);
                $resultado->execute(array(":cur"=>$cod,":alu"=>$alu));   
                
                
                if (isset($_POST['btn_res'])) {                                           
                    $indice = isset($_POST['indice']) && !empty($_POST['indice']) ? $_POST['indice'] : null;
                    for ($e=0; $e<=$indice; $e++) { 
                        $c_nro = "c_nro$e";
                        $a_nro = "a_nro$e";
                        $p_nro = "p_nro$e";
                        $rta = "rta$e";
                        $obs = "obs$e";
                        $curso_cod = isset($_POST["$c_nro"]) && !empty($_POST["$c_nro"]) ? $_POST["$c_nro"] : null;                   
                        $alumno_nro = isset($_POST["$a_nro"]) && !empty($_POST["$a_nro"]) ? $_POST["$a_nro"] : null;
                        $preg_nro = isset($_POST["$p_nro"]) && !empty($_POST["$p_nro"]) ? $_POST["$p_nro"] : null;
                        $rta = isset($_POST["$rta"]) && !empty($_POST["$rta"]) ? $_POST["$rta"] : null;
                        $obs = isset($_POST["$obs"]) && !empty($_POST["$obs"]) ? $_POST["$obs"] : null;
                        
                        if (is_numeric($rta)) {
                            $sql="INSERT INTO encuesta (curso_cod,alumno_nro,preg_nro,rta) VALUES(:cc,:an,:pn,:rta)";
                            $resultado= $base->prepare($sql);
                            $resultado->execute(array(":cc"=>$curso_cod,":an"=>$alumno_nro,":pn"=>$preg_nro,":rta"=> $rta));
                    
                            header("Location:miscursos.php");
                        }else {
                            $sql="INSERT INTO encuesta (curso_cod,alumno_nro,preg_nro,observacion) VALUES(:cc,:an,:pn,:obs)";
                            
                            $resultado= $base->prepare($sql);
                            $resultado->execute(array(":cc"=>$curso_cod,":an"=>$alumno_nro,":pn"=>$preg_nro,":obs"=>$obs ));
                    
                            header("Location:miscursos.php");
                        }

                    }
                }

                $i=0;
             ?>
            <h1 class="center section">Preguntas</h1>

            
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <table>
                        <?php while ($registros=$resultado->fetch(PDO::FETCH_OBJ) ):?>
                        <tr>
                        

                        <td><?=$registros->preg_desc?></td>
                            <td><?php if ($registros->preg_tipo == 'texto'){
                                
                                echo "<input type='text' name='obs$i'>";
                            }
                            else {                               
                            echo "
                            
                                    <label>
                                        <input name='rta$i' type='radio' value='1' />
                                        <span>Excelente</span>
                                    </label>
                                
                                
                                    <label>
                                        <input name='rta$i' type='radio' value='2' />
                                        <span>Muy Bien</span>
                                    </label>
                                
                                
                                    <label>
                                        <input name='rta$i' type='radio' value='3' checked />
                                        <span>Bien</span>
                                    </label>
                                
                                
                                    <label>
                                        <input name='rta$i' type='radio' value='4' />
                                        <span>Regular</span>
                                    </label>
                                
                                
                                    <label>
                                        <input name='rta$i' type='radio' value='5' />
                                        <span>Malo</span>
                                    </label>
                                
                                ";
                                

                            } ?></td>


                            <input type="hidden" name="p_nro<?=$i?>" value="<?=$registros->preg_nro ?>">
                            <input type="hidden" name="c_nro<?=$i?>" value="<?=$registros->curso_cod ?>">
                            <input type="hidden" name="a_nro<?=$i?>" value="<?=$registros->alumno_nro ?>">
                            <input type="hidden" name="indice" value="<?=$i ?>">
                            
                            <?php $i++;?>
                            
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
    <script type="text/javascript" src="js/script.js"></script>

    </body>
</html>