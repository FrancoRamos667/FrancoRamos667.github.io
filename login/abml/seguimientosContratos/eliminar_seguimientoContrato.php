<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_seguimiento = $_GET["id"];

    $query = "DELETE FROM seguimientoscontratos WHERE id_seguimiento='$id_seguimiento'";
    mysqli_query($conexion, $query);
}

header("Location: seguimientoContrato.php");
exit;
?>
