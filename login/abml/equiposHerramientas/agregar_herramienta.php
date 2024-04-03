<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $herramienta = $_POST["herramienta"];
    $tipoHerramienta = $_POST["tipoHerramienta"];
    $estado = $_POST["estado"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $peso = $_POST["peso"];
    $materialHerramienta = $_POST["materialHerramienta"];
    $fechaAdquisicion = $_POST["fechaAdquisicion"];
    $id_almacen = $_POST["id_almacen"];

    $query = "INSERT INTO equiposherramientas (herramienta, tipoHerramienta, estado, marca, modelo, peso, materialHerramienta, fechaAdquisicion, id_almacen) 
              VALUES ('$herramienta', '$tipoHerramienta', '$estado', '$marca', '$modelo', '$peso', '$materialHerramienta', '$fechaAdquisicion', '$id_almacen')";
    mysqli_query($conexion, $query);

    header("Location: herramienta.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Herramienta</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Herramienta</h2>
    <form action="agregar_herramienta.php" method="post">
        <label for="herramienta">Herramienta:</label>
        <input type="text" id="herramienta" name="herramienta" required><br><br>
        <label for="tipoHerramienta">Tipo de Herramienta:</label>
        <input type="text" id="tipoHerramienta" name="tipoHerramienta" required><br><br>
        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required><br><br>
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required><br><br>
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br><br>
        <label for="peso">Peso:</label>
        <input type="text" id="peso" name="peso" required><br><br>
        <label for="materialHerramienta">Material de Herramienta:</label>
        <input type="text" id="materialHerramienta" name="materialHerramienta" required><br><br>
        <label for="fechaAdquisicion">Fecha de Adquisición:</label>
        <input type="date" id="fechaAdquisicion" name="fechaAdquisicion" required><br><br>
        <label for="id_almacen">ID Almacén:</label>
        <input type="text" id="id_almacen" name="id_almacen" required><br><br>
        <input type="submit" value="Agregar Herramienta">
    </form>
    <a href="herramienta.php">Volver a Herramientas</a>
</body>
</html>
