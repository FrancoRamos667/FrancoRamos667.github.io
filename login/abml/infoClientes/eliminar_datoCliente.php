<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_infoCliente = $_GET["id"];

    $query = "DELETE FROM informacionesclientes WHERE id_infoCliente='$id_infoCliente'";
    mysqli_query($conexion, $query);
}

header("Location: datoCliente.php");
exit;
?>
