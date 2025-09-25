<?php
session_start();

  if (!isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] !== true) {
      header("Location: Login.php");
      exit();
}

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
  <link rel="stylesheet" href="styles/Panel.css" />
  <title>Gestión de Productos - Effata</title>
</head>
<body>

  <nav>
    <ul>
      <li><a href="index.html">Inicio</a></li>
      <li><a href="main.php">Catálogo</a></li>
      <li><a href="contacto.html">Contacto</a></li>
      <li style="margin-left: auto;"><a href="logout.php" class="boton-logout">
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#b18b44" viewBox="0 0 24 24">
        <path d="M16 13v-2H7V8l-5 4 5 4v-3zM20 3h-8a2 2 0 0 0-2 2v4h2V5h8v14h-8v-4h-2v4a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z"/>
        </svg>
      </a></li>
    </ul>
  </nav>

  <section class="crud">
    <h1>Gestión de Productos</h1>
    
    <form class="crud-form" action="actions/insertar.php" method="POST" enctype="multipart/form-data">
      <input type="text" name ="producto" placeholder="Nombre del producto" required />
      <input type="text" name ="categoria" placeholder="Categoría" required />
      <input type="number" name="precio" placeholder="Precio" step="0.01" required />
      <input type="file" name="imagen" accept="image/*" required />
      <textarea placeholder="Descripción" name = "descripcion"></textarea>
      <button type="submit" class="boton">Agregar</button>
    </form>

    <table class="crud-table">
    <thead>
      <tr>
        <th>Producto</th>
        <th>Categoría</th>
        <th>Precio</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($datosProducto = $resultado->fetch_assoc()) {
        echo "<form action='actions/borrar.php' method='POST'>";
        echo "<tr>";
        echo "<td>{$datosProducto['nombre']}</td>";
        echo "<td>{$datosProducto['categoria']}</td>";
        echo "<td>$" . number_format($datosProducto['precio'], 2) . "</td>";
        echo "<td>{$datosProducto['descripcion']}</td>";

        echo "<td><img src='uploads/{$datosProducto['imagen']}' style='max-width:100px; border-radius:8px;' alt='Imagen del producto'></td>";

        echo '
        <td>
          <form action="actions/borrar.php" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="' . $datosProducto['id'] . '">
            <button type="submit" name="delete" class="delete">Borrar</button>
          </form>
        </td>';

       
        echo "</tr>";
        echo"</form>";
      }
      ?>
    </tbody>
</table>

  </section>

  <footer>
    <p>&copy; 2025 Effata. Todos los derechos reservados.</p>
  </footer>

</body>
</html>
