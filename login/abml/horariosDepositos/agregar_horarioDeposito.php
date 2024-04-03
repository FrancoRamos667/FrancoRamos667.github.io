<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaOperacion = $_POST["fechaOperacion"];
    $horarioOperacion = $_POST["horarioOperacion"];
    $horarioMantenimiento = $_POST["horarioMantenimiento"];

    $query = "INSERT INTO horariosDepositos (fechaOperacion, horarioOperacion, horarioMantenimiento) 
              VALUES ('$fechaOperacion', '$horarioOperacion', '$horarioMantenimiento')";
    mysqli_query($conexion, $query);

    header("Location: horarioDeposito.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Horario de Depósito</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Horario de Depósito</h2>
    <form action="agregar_horarioDeposito.php" method="post">
        <label for="fechaOperacion">Fecha de Operación:</label>
        <input type="date" id="fechaOperacion" name="fechaOperacion" required><br><br>
        <label for="horarioOperacion">Horario de Operación:</label>
        <input type="time" id="horarioOperacion" name="horarioOperacion" required><br><br>
        <label for="horarioMantenimiento">Horario de Mantenimiento:</label>
        <input type="time" id="horarioMantenimiento" name="horarioMantenimiento" required><br><br>
        <input type="submit" value="Agregar Horario de Depósito">
    </form>
    <a href="horarioDeposito.php">Volver a Horarios de Depósito</a>
</body>
</html>
