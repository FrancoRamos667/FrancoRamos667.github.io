<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM domiciliosclientes WHERE id_domicilioCliente='$id'";
    mysqli_query($conexion, $query);
}

header("Location: domicilioCliente.php");
exit;
?>
