<?php
    if(isset($_POST["Eliminar"])){
        if(isset($_POST["dni"])){
            
            $dni = $_POST["dni"];
            $consulta=$ruta->query("DELETE FROM clientes WHERE cliente.dni = '$dni'");

            if($consulta == 1){
                echo"Se ha eliminado";
            }
            else{
                echo"no se ha eliminado";
            }
        }
        else{
            
            echo " complete , no sea boludo ";
        }
    }


?>