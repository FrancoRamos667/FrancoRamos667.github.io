<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_compra = $_GET["id"];

    $query = "DELETE FROM compraVenta WHERE id_compra='$id_compra'";
    mysqli_query($conexion, $query);
}

header("Location: compra.php");
exit;
?>
