<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];

    $query = "DELETE FROM registrolaboral WHERE id_registro='$id'";
    mysqli_query($conexion, $query);
}

header("Location: registroLaboral.php");
exit;
?>
