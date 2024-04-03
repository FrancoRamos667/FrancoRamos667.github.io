<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM telefonos WHERE id_telefono='$id'";
    mysqli_query($conexion, $query);
}

header("Location: telefono.php");
exit;
?>
