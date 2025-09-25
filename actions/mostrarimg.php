<?php
include '../conexion.php';

if (!isset($_GET['id'])) {
    http_response_code(400);
    exit("Falta ID");
}

$id = intval($_GET['id']);

$sql = "SELECT imagen FROM productos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    http_response_code(404);
    exit("Imagen no encontrada");
}

$stmt->bind_result($imagen);
$stmt->fetch();
$stmt->close();

if ($imagen) {
    
    header("Content-Type: image/jpeg");
    echo $imagen;
} else {
    http_response_code(404);
    exit("Imagen vacía");
}
?>

