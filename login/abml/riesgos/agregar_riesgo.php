<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $riesgo = $_POST["riesgo"];
    $cumplimiento = $_POST["cumplimiento"];

    $query = "INSERT INTO riesgos (riesgo, cumplimiento) VALUES ('$riesgo', '$cumplimiento')";
    mysqli_query($conexion, $query);

    header("Location: riesgo.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Riesgo</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Riesgo</h2>
    <form action="agregar_riesgo.php" method="post">
        <label for="riesgo">Riesgo:</label>
        <input type="text" id="riesgo" name="riesgo" required><br><br>
        <label for="cumplimiento">Cumplimiento:</label>
        <input type="text" id="cumplimiento" name="cumplimiento" required><br><br>
        <input type="submit" value="Agregar Riesgo">
    </form>
    <a href="riesgo.php">Volver a Listado de Riesgos</a>
</body>
</html>
