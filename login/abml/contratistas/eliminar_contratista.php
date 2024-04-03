<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_contratista = $_GET["id"];
    $query = "DELETE FROM contratistas WHERE id_contratista='$id_contratista'";
    mysqli_query($conexion, $query);
}

header("Location: contratista.php");
exit();
?>
