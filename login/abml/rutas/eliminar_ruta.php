<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_ruta = $_GET["id"];

    $query = "DELETE FROM rutas WHERE id_ruta='$id_ruta'";
    mysqli_query($conexion, $query);
}

header("Location: ruta.php");
exit;
?>
