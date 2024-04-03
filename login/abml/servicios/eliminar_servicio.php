<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM servicios WHERE id_servicio='$id'";
    mysqli_query($conexion, $query);
}

header("Location: servicio.php");
exit;
?>
