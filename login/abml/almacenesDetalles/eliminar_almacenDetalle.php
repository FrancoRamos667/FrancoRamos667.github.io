<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM almacenesdetalles WHERE id_almacenDetalle='$id'";
    mysqli_query($conexion, $query);
}

header("Location: almacenDetalle.php");
exit;
?>
