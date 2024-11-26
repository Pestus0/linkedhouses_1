<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto_id'])) {
    $id_producto = $_POST['producto_id'];

    // Buscar y eliminar el producto del carrito
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $index => $producto) {
            if ($producto['id'] == $id_producto) {
                unset($_SESSION['carrito'][$index]);
                break;
            }
        }
        // Reindexar el array del carrito
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    }
}

// Redirigir al carrito
header("Location: carrito.php");
exit;
?>