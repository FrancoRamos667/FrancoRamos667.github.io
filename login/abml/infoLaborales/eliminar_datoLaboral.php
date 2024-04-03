<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM informacioneslaborales WHERE id_infoLaboral='$id'";
    mysqli_query($conexion, $query);
}

header("Location: datoLaboral.php");
exit;
?>
