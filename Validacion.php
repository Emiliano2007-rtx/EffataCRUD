<?php
    session_start();

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $usuario = $_POST["usuario"];
          $passw = $_POST["contrasena"];

          if ($usuario === "Example" && $passw === "1234") {
              $_SESSION["autenticado"] = true;
              header("Location: AdminPanel.php");
              exit();
          } else {
              header("Location: Validacion.php");
              exit();
          }
   }

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error de Datos - Effata</title>
  <style>
    :root {
      --verde-fondo: rgba(125,160,136,255);
      --verde-oscuro: #2d3b2c;
      --dorado: #b18b44;
      --gris: #444;
      --blanco: #fff;
      --rojo: #c0392b;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--verde-fondo);
      color: var(--verde-oscuro);
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    nav {
      background-color: var(--verde-oscuro);
      padding: 1rem;
    }

    nav ul {
      list-style: none;
      display: flex;
      justify-content: center;
      gap: 2rem;
      margin: 0;
      padding: 0;
    }

    nav a {
      color: var(--blanco);
      text-decoration: none;
      font-weight: bold;
    }

    nav a:hover {
      color: var(--dorado);
    }

    .error {
      flex-grow: 1;
      padding: 4rem 1rem;
      text-align: center;
    }

    .logo {
      max-width: 120px;
      border-radius: 50%;
      margin-bottom: 1rem;
    }

    .error h1 {
      font-size: 2rem;
      color: var(--rojo);
      margin-bottom: 1rem;
    }

    .mensaje-error {
      font-size: 1.2rem;
      margin-bottom: 2rem;
      color: var(--verde-oscuro);
    }

    .boton {
      display: inline-block;
      background-color: var(--dorado);
      color: var(--blanco);
      text-decoration: none;
      padding: 0.8rem 1.5rem;
      border-radius: 0.5rem;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .boton:hover {
      background-color: #98753a;
    }

    footer {
      background-color: var(--verde-oscuro);
      padding: 1rem;
      font-size: 0.85rem;
      color: #b18b44;
      text-align: center;
    }
  </style>
</head>
<body>

  <nav>
    <ul>
      <li><a href="index.html">Inicio</a></li>
      <li><a href="main.php">Catálogo</a></li>
    </ul>
  </nav>

  <section class="error">
    <img src="img/efflg2.jpg" alt="Logo Effata" class="logo">
    <h1>¡Datos incorrectos!</h1>
    <p class="mensaje-error">El usuario o la contraseña que ingresaste no son válidos.</p>
    <a href="login.php" class="boton">Volver a Intentar</a>
  </section>

  <footer>
    <p>&copy; 2025 Effata. Todos los derechos reservados.</p>
  </footer>

</body>
</html>
