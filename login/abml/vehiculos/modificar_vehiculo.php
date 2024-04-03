<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
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

    $query = "UPDATE vehiculos SET Vehículo='$vehiculo', Marca='$marca', Modelo='$modelo', fabricación='$fabricacion', numeroSerie='$numeroSerie', tipoCombustible='$tipoCombustible', capacidadCarga='$capacidadCarga', Kilometraje='$kilometraje', estadoVehiculo='$estadoVehiculo', fechaAdquisicion='$fechaAdquisicion', valorCompra='$valorCompra', Documentos='$documentos', patente='$patente' WHERE id_vehiculo='$id'";
    mysqli_query($conexion, $query);

    header("Location: vehiculo.php");
    exit();
}

// Obtener datos del vehículo si el ID está presente y la consulta devuelve resultados
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id) {
    $query = "SELECT * FROM vehiculos WHERE id_vehiculo='$id'";
    $result = mysqli_query($conexion, $query);
    $vehiculo = mysqli_fetch_assoc($result);
} else {
    $vehiculo = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Vehículo</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Vehículo</h2>
    <form action="modificar_vehiculo.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="vehiculo">Vehículo:</label>
        <input type="text" id="vehiculo" name="vehiculo" value="<?php echo isset($vehiculo['Vehículo']) ? $vehiculo['Vehículo'] : ''; ?>" required><br><br>
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?php echo isset($vehiculo['Marca']) ? $vehiculo['Marca'] : ''; ?>" required><br><br>
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?php echo isset($vehiculo['Modelo']) ? $vehiculo['Modelo'] : ''; ?>" required><br><br>
        <label for="fabricacion">Fabricación:</label>
        <input type="text" id="fabricacion" name="fabricacion" value="<?php echo isset($vehiculo['fabricación']) ? $vehiculo['fabricación'] : ''; ?>" required><br><br>
        <label for="numeroSerie">Número de Serie:</label>
        <input type="text" id="numeroSerie" name="numeroSerie" value="<?php echo isset($vehiculo['numeroSerie']) ? $vehiculo['numeroSerie'] : ''; ?>" required><br><br>
        <label for="tipoCombustible">Tipo de Combustible:</label>
        <input type="text" id="tipoCombustible" name="tipoCombustible" value="<?php echo isset($vehiculo['tipoCombustible']) ? $vehiculo['tipoCombustible'] : ''; ?>" required><br><br>
        <label for="capacidadCarga">Capacidad de Carga:</label>
        <input type="text" id="capacidadCarga" name="capacidadCarga" value="<?php echo isset($vehiculo['capacidadCarga']) ? $vehiculo['capacidadCarga'] : ''; ?>" required><br><br>
        <label for="kilometraje">Kilometraje:</label>
        <input type="text" id="kilometraje" name="kilometraje" value="<?php echo isset($vehiculo['Kilometraje']) ? $vehiculo['Kilometraje'] : ''; ?>" required><br><br>
        <label for="estadoVehiculo">Estado del Vehículo:</label>
        <input type="text" id="estadoVehiculo" name="estadoVehiculo" value="<?php echo isset($vehiculo['estadoVehiculo']) ? $vehiculo['estadoVehiculo'] : ''; ?>" required><br><br>
        <label for="fechaAdquisicion">Fecha de Adquisición:</label>
        <input type="text" id="fechaAdquisicion" name="fechaAdquisicion" value="<?php echo isset($vehiculo['fechaAdquisicion']) ? $vehiculo['fechaAdquisicion'] : ''; ?>" required><br><br>
        <label for="valorCompra">Valor de Compra:</label>
        <input type="text" id="valorCompra" name="valorCompra" value="<?php echo isset($vehiculo['valorCompra']) ? $vehiculo['valorCompra'] : ''; ?>" required><br><br>
        <label for="documentos">Documentos:</label>
        <input type="text" id="documentos" name="documentos" value="<?php echo isset($vehiculo['Documentos']) ? $vehiculo['Documentos'] : ''; ?>" required><br><br>
        <label for="patente">Patente:</label>
        <input type="text" id="patente" name="patente" value="<?php echo isset($vehiculo['patente']) ? $vehiculo['patente'] : ''; ?>" required><br><br>
        <input type="submit" value="Modificar Vehículo">
    </form>
    <a href="vehiculo.php">Volver a Vehículos</a>
</body>
</html>
