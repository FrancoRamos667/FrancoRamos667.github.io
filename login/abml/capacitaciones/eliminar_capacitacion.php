<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM capacitaciones WHERE id_capacitacion='$id'";
    mysqli_query($conexion, $query);
}

header("Location: capacitacion.php");
exit;
?>
