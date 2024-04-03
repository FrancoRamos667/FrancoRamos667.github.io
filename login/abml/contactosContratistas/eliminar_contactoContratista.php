<?php
include 'conexion2.php';

// Verificar si se ha enviado un ID válido por el método GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_contacto = $_GET['id'];

    // Eliminar el contacto de contratista de la base de datos
    $query = "DELETE FROM Contactoscontratistas WHERE id_contacto = '$id_contacto'";
    mysqli_query($conexion, $query);

    // Redireccionar al listado de contactos de contratistas
    header("Location: contactoContratista.php");
    exit();
} else {
    echo "ID de contacto de contratista no especificado.";
    exit();
}
?>
