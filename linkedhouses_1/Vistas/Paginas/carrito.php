<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="../Estilos/styles.css">
</head>
<body>
    <header class="encabezado">
        <img src="../Media/Logo1.png" alt="">
        <ul>
            <a href="vista.php">Volver a la página principal</a>
            <a href="Modelo/Models/logout.php">Cerrar Sesión</a>
        </ul>
    </header>

    <h1>Tu Carrito de Compras</h1>

    <!-- Mostrar mensajes basados en el parámetro 'mensaje' -->
    <?php if (isset($_GET['mensaje'])): ?>
        <div class="mensaje">
            <?php
            if ($_GET['mensaje'] == 'ya_existe') {
                echo "<p>Este producto ya está en tu carrito.</p>";
            } elseif ($_GET['mensaje'] == 'agregado') {
                echo "<p>Producto agregado al carrito con éxito.</p>";
            }
            ?>
        </div>
    <?php endif; ?>

    <div class="carrito-container">
        <?php
        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])):
            $total = 0;
            foreach ($_SESSION['carrito'] as $producto):
                $total += $producto['precio'] * $producto['cantidad'];
        ?>
                <div class="producto-carrito">
                    <img 
                        src="<?= !empty($producto['imagen']) ? htmlspecialchars($producto['imagen']) : '../Media/default-image.png' ?>" 
                        alt="<?= htmlspecialchars($producto['localidad']) ?>" 
                        class="carrito-img">
                    <div class="detalles-producto">
                        <h2><?= htmlspecialchars($producto['localidad']) ?></h2>
                        <p>Precio: $<?= number_format($producto['precio'], 2) ?></p>
                        <p>Cantidad: <?= $producto['cantidad'] ?></p>
                        <form action="eliminar.php" method="POST" class="formulario-eliminar">
                            <input type="hidden" name="producto_id" value="<?= $producto['id']; ?>">
                            <button type="submit">Eliminar</button>
                        </form>
                    </div>
                </div>
        <?php
            endforeach;
        ?>  
            <div class="total-carrito">
                <h2>Total: $<?= number_format($total, 2) ?></h2>
                <form action="finalizar_compra.php" method="post">
                    <input type="hidden" name="total_compra" value="<?= $total ?>">
                    <button type="submit" name="finalizar">Finalizar Compra</button>
                </form>
            </div>
        <?php else: ?>
            <p>Tu carrito está vacío.</p>
        <?php endif; ?>
    </div>
</body>
</html>
