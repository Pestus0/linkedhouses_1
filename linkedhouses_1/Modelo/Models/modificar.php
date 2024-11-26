<?php
    if(isset($_POST["Modificar"])){
        if(isset($_POST["nombre"])or isset($_POST["apellido"])or isset($_POST["edad"])){
           
            $dni = $_POST["dni"];
            $nom = $_POST["nombre"];
            $ape = $_POST["apellido"];
            $eda = $_POST["edad"];
            $consulta=$ruta->query("update clientes set  nombre = '$nom' , apellido = '$ape' ,edad = '$eda' where cliente.dni = '$dni'");

            if($consulta == 1){
                echo"Se ha modificado";
            }
            else{
                echo"no se ha modificado";
            }
        }
        else{
            
            echo " complete , no sea pelele ";
        }
    }


?>