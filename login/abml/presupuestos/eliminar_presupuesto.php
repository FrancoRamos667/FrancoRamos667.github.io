<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM presupuestos WHERE id_presupuesto='$id'";
    mysqli_query($conexion, $query);
}

header("Location: presupuesto.php");
exit;
?>

