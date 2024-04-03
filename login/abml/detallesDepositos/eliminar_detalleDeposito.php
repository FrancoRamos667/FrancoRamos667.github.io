<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM detallesdepositos WHERE id_detalleDeposito='$id'";
    mysqli_query($conexion, $query);
}

header("Location: detalleDeposito.php");
exit;
?>
