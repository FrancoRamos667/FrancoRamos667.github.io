<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM seguridadeslaborales WHERE id_seguridad='$id'";
    mysqli_query($conexion, $query);
}

header("Location: seguridadLaboral.php");
exit;
?>
