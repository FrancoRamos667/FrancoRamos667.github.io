<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_contrato = $_GET["id"];
    $query = "DELETE FROM contratos WHERE id_contrato='$id_contrato'";
    mysqli_query($conexion, $query);
}

header("Location: contrato.php");
exit();
?>
