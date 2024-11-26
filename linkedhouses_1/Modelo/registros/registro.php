<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "root"; // Ajusta esto si tu usuario de MySQL es diferente
    $password = ""; // Ajusta esto si tu contraseña de MySQL es diferente
    $dbname = "linkedhouses_1";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recoger los datos enviados por el formulario
    $dni = $conn->real_escape_string($_POST['dni']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellido = $conn->real_escape_string($_POST['apellido']);
    $contra = $conn->real_escape_string($_POST['contra']);
    $email = $conn -> real_escape_string($_POST ['email']);
    $telefono = $conn -> real_escape_string ($_POST['telefono']);


     // Validar que todos los campos estén llenos
     if (empty($dni) || empty($nombre) || empty($apellido) || empty($contra) || empty($email) || empty($telefono)) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Hash de la contraseña para mayor seguridad
        $contraHash = password_hash($contra, PASSWORD_BCRYPT);

    // Insertar los datos del usuario en la base de datos
    $sql = "INSERT INTO usuario (dni, nombre, apellido, contra, email, telefono) 
            VALUES ('$dni', '$nombre', '$apellido', '$contraHash','$email', '$telefono')";

            if($conn->query($sql) === TRUE){
                echo "<script>window.location.href = '../../Vistas/Paginas/login.html';</script>";
            }
            else{
                echo "Error en el usuario y/o contraseña para continuar";
            }   
        }
    }
?>