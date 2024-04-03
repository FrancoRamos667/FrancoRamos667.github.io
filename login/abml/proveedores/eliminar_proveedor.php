<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM proveedores WHERE id_proveedor='$id'";
    mysqli_query($conexion, $query);
}

header("Location: proveedor.php");
exit;
?>
