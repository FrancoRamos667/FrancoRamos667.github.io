<?php
include 'conexion2.php';

// Verificar si se ha enviado un ID de asignación de contratista por método GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_asignacionContratista = $_GET["id"];

    // Eliminar la asignación de contratista de la base de datos
    $query = "DELETE FROM asignacionescontratistas WHERE id_asignacionContratista='$id_asignacionContratista'";
    mysqli_query($conexion, $query);
}

// Redirigir a la página principal de asignaciones de contratistas
header("Location: asignacionContratista.php");
exit();
?>
