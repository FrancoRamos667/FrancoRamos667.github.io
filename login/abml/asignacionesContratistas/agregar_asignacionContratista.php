<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_contratista = $_POST["id_contratista"];
    $id_proyectoObra = $_POST["id_proyectoObra"];

    $query = "INSERT INTO asignacionescontratistas (id_contratista, id_proyectoObra) 
              VALUES ('$id_contratista', '$id_proyectoObra')";
    mysqli_query($conexion, $query);

    header("Location: asignacionContratista.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Asignación de Contratista</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Asignación de Contratista</h2>
    <form action="agregar_asignacionContratista.php" method="post">
        <label for="id_contratista">Número de Contratista:</label>
        <input type="text" id="id_contratista" name="id_contratista" required><br><br>
        <label for="id_proyectoObra">Número de Proyecto/Obra:</label>
        <input type="text" id="id_proyectoObra" name="id_proyectoObra" required><br><br>
        <input type="submit" value="Agregar Asignación de Contratista">
    </form>
    <a href="asignacionContratista.php">Volver a Asignaciones de Contratistas</a>
</body>
</html>
