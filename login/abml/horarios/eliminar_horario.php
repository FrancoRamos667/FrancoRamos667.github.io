<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM horarios WHERE id_horario='$id'";
    mysqli_query($conexion, $query);
}

header("Location: horario.php");
exit;
?>
