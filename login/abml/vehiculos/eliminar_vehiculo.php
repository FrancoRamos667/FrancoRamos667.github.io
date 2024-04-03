<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM vehiculos WHERE id_vehiculo='$id'";
    mysqli_query($conexion, $query);
}

header("Location: vehiculo.php");
exit;
