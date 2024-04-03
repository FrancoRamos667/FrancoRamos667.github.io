<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM horariosDepositos WHERE id_horarioDeposito='$id'";
    mysqli_query($conexion, $query);
}

header("Location: horarioDeposito.php");
exit;
?>
