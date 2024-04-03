<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_contrato = $_POST["id_contrato"];
    $fechaSeguimiento = $_POST["fechaSeguimiento"];
    $estadoSeguimiento = $_POST["estadoSeguimiento"];
    $observaciones = $_POST["observaciones"];

    $query = "INSERT INTO seguimientoscontratos (id_contrato, fechaSeguimiento, estadoSeguimiento, observaciones) VALUES ('$id_contrato', '$fechaSeguimiento', '$estadoSeguimiento', '$observaciones')";
    mysqli_query($conexion, $query);

    header("Location: seguimientoContrato.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Seguimiento de Contrato</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Seguimiento de Contrato</h2>
    <form action="agregar_seguimientoContrato.php" method="post">
        <label for="id_contrato">ID del Contrato:</label>
        <input type="text" id="id_contrato" name="id_contrato" required><br><br>
        <label for="fechaSeguimiento">Fecha de Seguimiento:</label>
        <input type="date" id="fechaSeguimiento" name="fechaSeguimiento" required><br><br>
        <label for="estadoSeguimiento">Estado de Seguimiento:</label>
        <input type="text" id="estadoSeguimiento" name="estadoSeguimiento" required><br><br>
        <label for="observaciones">Observaciones:</label>
        <input type="text" id="observaciones" name="observaciones" required><br><br>
        <input type="submit" value="Agregar Seguimiento de Contrato">
    </form>
    <a href="seguimientoContrato.php">Volver a Seguimientos de Contratos</a>
</body>
</html>
