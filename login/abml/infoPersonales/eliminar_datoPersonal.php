<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM informacionespersonales WHERE id_info='$id'";
    mysqli_query($conexion, $query);
}

header("Location: datoPersonal.php");
exit;
?>
