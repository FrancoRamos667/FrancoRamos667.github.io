<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_asignacion = $_GET["id"];

    $query = "DELETE FROM asignaciones WHERE id_asignacion='$id_asignacion'";
    mysqli_query($conexion, $query);
}

header("Location: asignacion.php");
exit();
?>
