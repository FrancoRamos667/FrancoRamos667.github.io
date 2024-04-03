<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM facturas WHERE id_factura='$id'";
    mysqli_query($conexion, $query);
}

header("Location: factura.php");
exit;
?>
