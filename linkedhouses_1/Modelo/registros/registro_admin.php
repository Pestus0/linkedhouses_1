<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "root"; // Ajusta si tu usuario de MySQL es diferente
    $password = ""; // Ajusta si tu contraseña de MySQL es diferente
    $dbname = "linkedhouses_1";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recoger datos del formulario y sanitizarlos
    $nombre = $conn->real_escape_string(trim($_POST['nombre']));
    $contra = trim($_POST['contra']);
    $email = $conn->real_escape_string(trim($_POST['email']));

    // Validar que todos los campos estén llenos
    if (empty($nombre) || empty($contra) || empty($email)) {
        echo "Todos los campos son obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El formato del email no es válido.";
    } else {
        // Hash de la contraseña para mayor seguridad
        $contraHash = password_hash($contra, PASSWORD_BCRYPT);

        // Preparar la consulta para evitar SQL Injection
        $sql = "INSERT INTO administrador (nombre, contra, email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nombre, $contraHash, $email);

        // Ejecutar la consulta y verificar el resultado
        if ($stmt->execute()) {
            echo "<script>alert('Registro exitoso.'); window.location.href = '../../Vistas/Paginas/login.html';</script>";
        } else {
            // Mostrar error si ocurre un problema
            if ($conn->errno == 1062) { // Error de clave duplicada
                echo "El email ya está registrado.";
            } else {
                echo "Error: " . $conn->error;
            }
        }

        // Cerrar el statement
        $stmt->close();
    }

    // Cerrar la conexión
    $conn->close();
}
?>