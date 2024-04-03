<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM detallecompra WHERE id_compraDetalle='$id'";
    mysqli_query($conexion, $query);
}

header("Location: detalleCompra.php");
exit;
?>
