<?php
include 'conexion2.php'; // Incluir el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtener el ID del documento a eliminar
    $id = $_GET["id"];

    // Eliminar el documento de la base de datos
    $query = "DELETE FROM documentoslegales WHERE id_documento='$id'";
    mysqli_query($conexion, $query);
}

// Redireccionar a la página de listado de documentos
header("Location: documentoLegal.php");
exit();
?>
