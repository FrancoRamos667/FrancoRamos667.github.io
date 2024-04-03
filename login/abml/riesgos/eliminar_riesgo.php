<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_riesgo = $_GET["id"];

    $query = "DELETE FROM riesgos WHERE id_riesgo='$id_riesgo'";
    mysqli_query($conexion, $query);
}

header("Location: riesgo.php");
exit;
?>
