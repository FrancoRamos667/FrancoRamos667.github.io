<?php
include 'conexion2.php'; // Incluir el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtener el ID del documento a eliminar
    $id = $_GET["id"];

    // Eliminar el documento adjunto de la base de datos
    $query = "DELETE FROM documentosadjuntos WHERE id_documentoContrato='$id'";
    mysqli_query($conexion, $query);
}

// Redireccionar al listado de documentos adjuntos
header("Location: documentoAdjunto.php");
exit;
?>
