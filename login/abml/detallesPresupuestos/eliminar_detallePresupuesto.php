<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_detallePresupuesto = $_GET["id"];
    $query = "DELETE FROM detallesPresupuestos WHERE id_detallePresupuesto='$id_detallePresupuesto'";
    mysqli_query($conexion, $query);
}

header("Location: detallePresupuesto.php");
exit();
?>
