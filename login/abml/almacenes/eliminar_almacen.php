<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM almacenes WHERE id_almacen='$id'";
    mysqli_query($conexion, $query);
}

header("Location: almacen.php");
exit;
?>
