<?php
session_start(); // Asegúrate de iniciar la sesión al principio

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "linkedhouses_1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$location = isset($_GET['location']) ? $_GET['location'] : '';

// Construir la consulta con filtros
$sql = "SELECT * FROM casas WHERE 1=1"; 
if ($location) {
    $sql .= " AND localidad = '" . $conn->real_escape_string($location) . "'";
}

// Ejecutar la consulta
$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
  <link rel="stylesheet" href="../Estilos/styles.css">
</head>
<body>
  <header class="encabezado">
    <img src="../Media/Logo1.png" alt="">
    <ul>
        <?php
        if (!isset($_SESSION['usuario'])) {
            echo '<a href="Modelo/Models/logout.php">Cerrar Sesión</a>';
        } else {
            if ($_SESSION['rol'] === 'administrador') {
                echo '<a href="agregar.html">Agregar</a>';
                echo '<a href="registro_admin.html">Agregar Admin</a>';
            }
        }
        echo '<a href="Modelo/Models/logout.php">Cerrar Sesión</a>';
        echo '<a href="carrito.php">Carrito</a>';
        ?>
    </ul>
  </header>
  <div class="search-container">
    <div class="background-images"></div>
    <div class="search-box">
      <h2>¿Qué estás buscando?</h2>
      <form method="GET" action="">
        <select name="location">
          <option value="">Localidad</option>
          <!-- Asegúrate de que los valores coincidan con los datos en tu base -->
          <option value="monte-grande" <?= $location === 'monte-grande' ? 'selected' : '' ?>>Monte Grande</option>
          <option value="ezeiza" <?= $location === 'ezeiza' ? 'selected' : '' ?>>Ezeiza</option>
          <option value="canning" <?= $location === 'canning' ? 'selected' : '' ?>>Canning</option>
          <!-- Agrega más opciones según necesites -->
        </select>
        <button type="submit">Buscar</button>
      </form>
    </div>
  </div>
  <div class="carousel-container">
    <button class="carousel-btn left" id="prevBtn">&#9664;</button>
    <div class="carousel">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="card">
        <?php if (!empty($row['img'])): ?>
           <img src="<?= htmlspecialchars($row['img']) ?>" class="card-img-top" alt="Imagen">
        <?php else: ?>
           <p>No hay imagen disponible</p>
        <?php endif; ?>
        <div class="card-info">
            <p class="card-title"><?= htmlspecialchars($row['localidad']) ?></p>
            <p class="card-price">$<?= htmlspecialchars($row['precio']) ?></p>
            <div class="card-buttons">
                <form action="agregar_al_carrito.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button class="btn buy-btn" type="submit">Agregar al carrito</button>
                </form>
                <button class="btn consult-btn" onclick="consultar('<?= htmlspecialchars($row['id']) ?>')">Consultar</button>
            </div>
        </div>
      </div>
    <?php endwhile; ?>
    </div>
    <button class="carousel-btn right" id="nextBtn">&#9654;</button>
  </div>
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-logo">
        <img src="../Media/Logo1.png" alt="Hogar Ideal" class="logo">
      </div>
      <div class="footer-info">
        <h3>Monte Grande</h3>
        <p>Alem 720, Monte Grande</p>
        <p>GBA Sur, Argentina.</p>
        <p>11-2523-8093</p>
        <p>11-3448-2459</p>
        <p><a href="hogarideal342@gmail.com">hogarideal342@gmail.com</a></p>
        <p>Horario de atención: Lunes a viernes de 09:00 a 12:00 y de 15:30 a 19:00 Sábados de 10:00 a 13:30</p>
      </div>
      <div class="footer-links">
        <h3>SECCIONES</h3>
        <ul>
          <li><a href="#">Quienes somos</a></li>
          <li><a href="pages/Propiedades.html">Propiedades</a></li>
          <li><a href="pages/formulario.html">Contacto</a></li>
        </ul>
      </div>
    </div>
  </footer>

  <script src="../js/script.js"></script>
</body>
</html>