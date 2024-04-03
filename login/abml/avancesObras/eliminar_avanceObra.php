<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_avanceObra = $_GET["id"];

    $query = "DELETE FROM avancesobras WHERE id_avanceObra='$id_avanceObra'";
    mysqli_query($conexion, $query);
}

header("Location: avanceObra.php");
exit();
?>
