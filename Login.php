
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Effata</title>
  <link rel="stylesheet" href="styles/Log.css">
</head>
<body>

  <nav>
    <ul>
      <li><a href="index.html">Inicio</a></li>
      <li><a href="main.php">Catálogo</a></li>
      <li><a href="contacto.html">Contacto</a></li>
    </ul>
  </nav>

  <section class="login">
    <h1>Iniciar Sesión</h1>
    <form action="Validacion.php" method="post" class="login-form">
      <input type="text" name="usuario" placeholder="Usuario" required>
      <input type="password" name="contrasena" placeholder="Contraseña" required>
      <button type="submit" class="boton">Entrar</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2025 Effata. Todos los derechos reservados.</p>
    <p><strong>Desarrollador y administrador web:</strong> Emiliano Alvarado Iñiguez</p>
    <p>Sitio creado y mantenido por Emiliano Alvarado Iñiguez.</p>
  </footer>

</body>
</html>
