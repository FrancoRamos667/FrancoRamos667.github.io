<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaInicio = $_POST["fechaInicio"];
    $faltas = $_POST["faltas"];
    $id_horario = $_POST["id_horario"];

    $query = "INSERT INTO informacioneslaborales (fechaInicio, faltas, id_horario) 
              VALUES ('$fechaInicio', '$faltas', '$id_horario')";
    mysqli_query($conexion, $query);

    header("Location: datoLaboral.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Dato Laboral</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Dato Laboral</h2>
    <form action="agregar_datoLaboral.php" method="post">
        <label for="fechaInicio">Fecha de Inicio:</label>
        <input type="date" id="fechaInicio" name="fechaInicio" required><br><br>
        <label for="faltas">Faltas:</label>
        <input type="number" id="faltas" name="faltas" required><br><br>
        <label for="id_horario">ID de Horario:</label>
        <input type="text" id="id_horario" name="id_horario" required><br><br>
        <input type="submit" value="Agregar Dato Laboral">
    </form>
    <a href="datoLaboral.php">Volver a Datos Laborales</a>
</body>
</html>
