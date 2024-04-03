<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM telefonosclientes WHERE id_celCliente='$id'";
    mysqli_query($conexion, $query);
}

header("Location: telefonoCliente.php");
exit;
?>
