<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoSeguro = $_POST["tipoSeguro"];
    $cobertura = $_POST["cobertura"];
    $fechaSeguro = $_POST["fechaSeguro"];

    $query = "INSERT INTO segurosmedicos (tipoSeguro, cobertura, fechaSeguro) VALUES ('$tipoSeguro', '$cobertura', '$fechaSeguro')";
    mysqli_query($conexion, $query);

    header("Location: seguroMedico.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Seguro Médico</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Seguro Médico</h2>
    <form action="agregar_seguroMedico.php" method="post">
        <label for="tipoSeguro">Tipo de Seguro:</label>
        <input type="text" id="tipoSeguro" name="tipoSeguro" required><br><br>
        <label for="cobertura">Cobertura:</label>
        <input type="text" id="cobertura" name="cobertura" required><br><br>
        <label for="fechaSeguro">Fecha de Seguro:</label>
        <input type="date" id="fechaSeguro" name="fechaSeguro" required><br><br>
        <input type="submit" value="Agregar Seguro Médico">
    </form>
    <a href="seguroMedico.php">Volver a Seguros Médicos</a>
</body>
</html>
