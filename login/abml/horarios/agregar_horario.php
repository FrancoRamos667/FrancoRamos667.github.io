<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $horaEntrada = $_POST["horaEntrada"];
    $horaSalida = $_POST["horaSalida"];
    $diasLaborales = $_POST["diasLaborales"];
    $descripcion = $_POST["descripcion"];

    $query = "INSERT INTO horarios (horaEntrada, horaSalida, diasLaborales, Descripción) 
              VALUES ('$horaEntrada', '$horaSalida', '$diasLaborales', '$descripcion')";
    mysqli_query($conexion, $query);

    header("Location: horario.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Horario</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Horario</h2>
    <form action="agregar_horario.php" method="post">
        <label for="horaEntrada">Hora de Entrada:</label>
        <input type="time" id="horaEntrada" name="horaEntrada" required><br><br>
        <label for="horaSalida">Hora de Salida:</label>
        <input type="time" id="horaSalida" name="horaSalida" required><br><br>
        <label for="diasLaborales">Días Laborales:</label>
        <input type="text" id="diasLaborales" name="diasLaborales" required><br><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required><br><br>
        <input type="submit" value="Agregar Horario">
    </form>
    <a href="horario.php">Volver a Horarios</a>
</body>
</html>
