<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $idCliente = $_GET["id"];

    $query = "DELETE FROM clientes WHERE id_cliente='$idCliente'";
    mysqli_query($conexion, $query);
}

header("Location: cliente.php");
exit;
?>
