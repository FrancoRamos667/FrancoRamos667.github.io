<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM sucursal WHERE id_sucursal='$id'";
    mysqli_query($conexion, $query);
}

header("Location: ingreso.php");
exit;
?>
