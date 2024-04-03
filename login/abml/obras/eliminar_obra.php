<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM obras WHERE id_obra='$id'";
    mysqli_query($conexion, $query);
}

header("Location: obra.php");
exit;
?>
