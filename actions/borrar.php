<?php
include '../conexion.php';

if (isset($_POST["delete"]) && isset($_POST["id"])) {
    $idProducto = $_POST["id"];

    $sql = "DELETE FROM productos WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idProducto);
    
    if ($stmt->execute()) {
        header("Location: ../AdminPanel.php?msg=Eliminado");
        exit();
    } else {
        echo "Error al eliminar: " . $stmt->error;
    }
}
?>
