<?php
include '../conexion.php';

if (
    isset($_POST["producto"]) &&
    isset($_POST["categoria"]) &&
    isset($_POST["precio"]) &&
    isset($_POST["descripcion"]) &&
    isset($_FILES["imagen"]) &&
    $_FILES["imagen"]["error"] === UPLOAD_ERR_OK
) {
    $nombre = $_POST["producto"];
    $categoria = $_POST["categoria"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];

    
    $directorioDestino = '../uploads/';
    if (!is_dir($directorioDestino)) {
        mkdir($directorioDestino, 0777, true); 
    }

    
    $nombreArchivo = uniqid() . '_' . basename($_FILES["imagen"]["name"]);
    $rutaDestino = $directorioDestino . $nombreArchivo;

    
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaDestino)) {
        
        $sql = "INSERT INTO productos (nombre, categoria, precio, imagen, descripcion) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        if (!$stmt) {
            die("Error en la preparación: " . $conexion->error);
        }

        
        $stmt->bind_param("ssdss", $nombre, $categoria, $precio, $nombreArchivo, $descripcion);

        if ($stmt->execute()) {
            header("Location: ../AdminPanel.php?msg=Agregado");
            exit();
        } else {
            echo "Error al insertar: " . $stmt->error;
        }
    } else {
        echo "Error al mover la imagen al servidor.";
    }
} else {
    echo "Error: Datos incompletos o imagen no subida correctamente.";
}
?>
