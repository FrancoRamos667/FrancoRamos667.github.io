<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM ingresos WHERE id_ingreso='$id'";
    mysqli_query($conexion, $query);
}

header("Location: ingreso.php");
exit;
?>
