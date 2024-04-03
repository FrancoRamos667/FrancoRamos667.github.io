<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM incidenciasobras WHERE id_incidencia='$id'";
    mysqli_query($conexion, $query);
}

header("Location: incidenciaObra.php");
exit;
?>
