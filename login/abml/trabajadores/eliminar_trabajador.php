<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM trabajadores WHERE id_trabajador='$id'";
    mysqli_query($conexion, $query);
}

header("Location: trabajador.php");
exit;
?>
