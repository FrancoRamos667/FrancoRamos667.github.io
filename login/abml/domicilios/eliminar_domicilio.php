<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM domicilios WHERE id_domicilio='$id'";
    mysqli_query($conexion, $query);
}

header("Location: domicilio.php");
exit;
?>
