<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM impuestos WHERE id_impuesto='$id'";
    mysqli_query($conexion, $query);
}

header("Location: impuesto.php");
exit;
?>
