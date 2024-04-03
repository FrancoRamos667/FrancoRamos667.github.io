<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM segurosmedicos WHERE id_seguro='$id'";
    mysqli_query($conexion, $query);
}

header("Location: seguroMedico.php");
exit;
?>
