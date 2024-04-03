<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehiculo = $_POST["vehiculo"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $fabricacion = $_POST["fabricacion"];
    $numeroSerie = $_POST["numeroSerie"];
    $tipoCombustible = $_POST["tipoCombustible"];
    $capacidadCarga = $_POST["capacidadCarga"];
    $kilometraje = $_POST["kilometraje"];
    $estadoVehiculo = $_POST["estadoVehiculo"];
    $fechaAdquisicion = $_POST["fechaAdquisicion"];
    $valorCompra = $_POST["valorCompra"];
    $documentos = $_POST["documentos"];
    $patente = $_POST["patente"];

    $query = "INSERT INTO vehiculos (Vehículo, Marca, Modelo, fabricación, numeroSerie, tipoCombustible, capacidadCarga, Kilometraje, estadoVehiculo, fechaAdquisicion, valorCompra, Documentos, patente) VALUES ('$vehiculo', '$marca', '$modelo', '$fabricacion', '$numeroSerie', '$tipoCombustible', '$capacidadCarga', '$kilometraje', '$estadoVehiculo', '$fechaAdquisicion', '$valorCompra', '$documentos', '$patente')";
    mysqli_query($conexion, $query);

    header("Location: sucursal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Vehículo</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Agregar Vehículo</h2>
    <form action="agregar_vehiculo.php" method="post">
        <label for="vehiculo">Vehículo:</label>
        <input type="text" id="vehiculo" name="vehiculo" required><br><br>
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required><br><br>
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br><br>
        <label for="fabricacion">Fabricación:</label>
        <input type="text" id="fabricacion" name="fabricacion" required><br><br>
        <label for="numeroSerie">Número de Serie:</label>
        <input type="text" id="numeroSerie" name="numeroSerie" required><br><br>
        <label for="tipoCombustible">Tipo de Combustible:</label>
        <input type="text" id="tipoCombustible" name="tipoCombustible" required><br><br>
        <label for="capacidadCarga">Capacidad de Carga:</label>
        <input type="text" id="capacidadCarga" name="capacidadCarga" required><br><br>
        <label for="kilometraje">Kilometraje:</label>
        <input type="text" id="kilometraje" name="kilometraje" required><br><br>
        <label for="estadoVehiculo">Estado del Vehículo:</label>
        <input type="text" id="estadoVehiculo" name="estadoVehiculo" required><br><br>
        <label for="fechaAdquisicion">Fecha de Adquisición:</label>
        <input type="text" id="fechaAdquisicion" name="fechaAdquisicion" required><br><br>
        <label for="valorCompra">Valor de Compra:</label>
        <input type="text" id="valorCompra" name="valorCompra" required><br><br>
        <label for="documentos">Documentos:</label>
        <input type="text" id="documentos" name="documentos" required><br><br>
        <label for="patente">Patente:</label>
        <input type="text" id="patente" name="patente" required><br><br>
        <input type="submit" value="Agregar Vehículo">
    </form>
    <a href="vehiculo.php">Volver a Vehículos</a>
</body>
</html>
