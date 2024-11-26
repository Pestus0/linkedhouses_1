<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "linkedhouses_1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha recibido el ID del producto
if (isset($_POST['id'])) {
    $id_producto = $_POST['id'];

    // Verificar si el producto ya está en el carrito
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $item) {
            if ($item['id'] == $id_producto) {
                // El producto ya está en el carrito, redirigir sin agregarlo de nuevo
                header("Location: carrito.php?mensaje=ya_existe");
                exit;
            }
        }
    }

    // Consultar los detalles del producto
    $consulta = $conn->prepare("SELECT precio, localidad, img, id FROM casas WHERE id = ?");
    $consulta->bind_param("i", $id_producto);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();

        // Si el producto existe, agregarlo al carrito
        $producto_seleccionado = [
            'id' => $producto['id'],
            'localidad' => $producto['localidad'],
            'imagen' => $producto['img'],
            'precio' => $producto['precio'],
            'cantidad' => 1
        ];

        // Si el carrito no existe, inicializarlo
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Agregar el producto al carrito
        $_SESSION['carrito'][] = $producto_seleccionado;

        // Redirigir al carrito
        header("Location: carrito.php?mensaje=agregado");
    } else {
        echo "Producto no encontrado.";
    }
} else {
    echo "ID de producto no proporcionado.";
}
?>