<?php
    if (isset($_POST["enviar"])) {
        require 'conexion.php';     

        $login=htmlentities(addslashes($_POST["login"]));
    
        $password=htmlentities(addslashes($_POST["pw"]));
    
        $i = 0 ;
       
        $sql="SELECT * FROM personas WHERE email= :login";
    
        $resultado=$base->prepare($sql);

        $resultado->execute(array(":login"=>$login));
    
        while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    
            if (password_verify($password,$registro['pass'])) {
                $i++;
            }
            
    
        }


        if ($i>0) {
            header("Location:index.php");
        }else {
            header("Location:login.php");
        }
    
    
    
    
        $resultado->closeCursor();
    

     

    }
?>