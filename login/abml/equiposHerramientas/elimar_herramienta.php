<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM equiposherramientas WHERE id_herramienta='$id'";
    mysqli_query($conexion, $query);
}

header("Location: herramienta.php");
exit;
?>
