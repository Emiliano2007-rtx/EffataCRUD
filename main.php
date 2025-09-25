<?php
  include 'conexion.php';


    $sql = "SELECT * FROM productos";
    $resultado = $conexion->query($sql);
    $datosProducto=$conexion->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles/main.css">
  <title>Catálogo - Effata</title>
  
</head>
<body>

  <nav>
    <ul>
      <li><a href="index.html">Inicio</a></li>
      <li><a href="#catalogo">Catálogo</a></li>
      <li><a href="contacto.html">Contacto</a></li>
    </ul>
  </nav>
  
  <header>
    <img src="img/efflg2.jpg" alt="Logo Effata">
    <h1>Catálogo de Jabones y Velas</h1>
    <p>La magia de la alquimia en cada producto</p>
  </header>

  <main class="catalogo">
  <?php while ($datosProducto = $resultado->fetch_assoc()) : ?>
    <div class="item">
      <img src="uploads/<?php echo $datosProducto['imagen']; ?>" alt="Imagen del producto" style="max-width:100%; border-radius: 8px;">
      <h2><?php echo $datosProducto['nombre']; ?></h2>
      <p><strong>Categoría:</strong> <?php echo $datosProducto['categoria']; ?></p>
      <p><strong>Precio:</strong> $<?php echo number_format($datosProducto['precio'], 2); ?></p>
      <p><strong>Descripción:</strong> <?php echo $datosProducto['descripcion']; ?></p>

      <form action="actions/borrar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $datosProducto['id']; ?>">
      </form>
    </div>
  <?php endwhile; ?>
</main>

  <footer>
    <p>&copy; 2025 Effata. La magia de la alquimia.</p>
    <p><strong>Desarrollador y administrador web:</strong> Emiliano Alvarado Iñiguez</p>
    <p>Sitio creado y mantenido por Emiliano Alvarado Iñiguez.</p>
  </footer>
</body>
</html>
