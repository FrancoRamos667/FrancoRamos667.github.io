<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_contratista = $_POST["nombre_contratista"];
    $especialidad = $_POST["especialidad"];

    $query = "INSERT INTO contratistas (contratista, especialidad) 
              VALUES ('$nombre_contratista', '$especialidad')";
    mysqli_query($conexion, $query);

    header("Location: contratista.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Contratista</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Contratista</h2>
    <form action="agregar_contratista.php" method="post">
        <label for="nombre_contratista">Nombre del Contratista:</label>
        <input type="text" id="nombre_contratista" name="nombre_contratista" required><br><br>
        <label for="especialidad">Especialidad:</label>
        <input type="text" id="especialidad" name="especialidad" required><br><br>
        <input type="submit" value="Agregar Contratista">
    </form>
    <a href="contratista.php">Volver a Lista de Contratistas</a>
</body>
</html>
