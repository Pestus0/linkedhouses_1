<?php
session_start();

// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contra = "";
$DbNombre = "linkedhouses_1";

$conn = new mysqli($servidor, $usuario, $contra, $DbNombre);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $contra = trim($_POST['contra']);

    // Verificar que los campos no estén vacíos
    if (!empty($email) && !empty($contra)) {
        // Consulta para verificar tanto en 'usuario' como en 'administrador'
        $sql = "SELECT 'usuario' AS rol, contra FROM usuario WHERE email = ? 
                UNION 
                SELECT 'administrador' AS rol, contra FROM administrador WHERE email = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Obtener los datos del rol y la contraseña
            $stmt->bind_result($rol, $hashed_password);
            $stmt->fetch();

            // Verificar la contraseña
            if (password_verify($contra, $hashed_password)) {
                // Iniciar sesión y almacenar rol y email
                $_SESSION['usuario'] = $email;
                $_SESSION['rol'] = $rol;

                // Redirigir según el rol
                if ($rol === "administrador") {
                    echo "<script>window.location.href = '../../index.php';</script>";
                } else {
                    echo "<script>window.location.href = '../../index.php';</script>";
                }
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "No existe una cuenta con ese correo.";
        }

        $stmt->close();
    } else {
        echo "Por favor, completa todos los campos.";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
