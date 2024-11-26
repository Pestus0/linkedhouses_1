<?php
session_start();   
?>

<!doctype html>
<html lang="en">

<head>
  <title>Inicio</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="Vistas/Estilos/styles.css">

</head>
<body>
<header class="encabezado">
  <img src="Vistas/Media/Logo1.png" alt="">
  <ul>
      <?php
      if (!isset($_SESSION['usuario'])) {
          // Si no hay sesión activa
          echo '<a class="posicion" href="Vistas/Paginas/registro_admin.html">Registrarse</a>';
          echo '<a href="Vistas/Paginas/login.html">Iniciar Sesión</a>';
      } else {
          // Opciones según el rol
          if ($_SESSION['rol'] === 'administrador') {
              echo '<a href="Modelo/Models/logout.php">Cerrar Sesión</a>';
              echo '<a href="Vistas/Paginas/vista.php">Productos</a>';  
          } else {
              echo '<a href="Modelo/Models/logout.php">Cerrar Sesión</a>';
              echo '<a href="Vistas/Paginas/vista.php">Productos</a>';
          }
      }
      ?>
  </ul>
</header>

  <div class="inicio">
    <nav class="menubar">
      <div class="contenido">
        <h1>LinkedHouses</h1>
        <h3>Transaccion segura</h3>
        <p>Nosotros somos LinkedHouses, una empresa inmobiliaria con mas de 15 años de experiencia en el mercado,
          la cual busca lograr tener el hogar ideal para cada uno de sus clientes, siempre tratando de cumplir con 
          las caracteristicas deseadas de los mismos 
        </p>
      </div>
    </nav>
  <div class="imagen">
      <div class="marco">
        <img src="Vistas/Media/Logo1.png" alt="Logo">
      </div>
    </div>
  </div>

  <main>
  </main>

  <footer>
    <div class="footer-container">
      <a href="" class="footer-item">
        <img src="Vistas/Media/insta.jpg" alt="Foto 2">
      </a>
      <a href="" class="footer-item">
        <img src="Vistas/Media/docu.jpg" alt="Foto 3">
      </a>
    </div>
  </footer>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>