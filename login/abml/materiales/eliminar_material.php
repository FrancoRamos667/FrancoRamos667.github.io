<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM materiales WHERE id_material='$id'";
    mysqli_query($conexion, $query);
}

header("Location: material.php");
exit;
?>
