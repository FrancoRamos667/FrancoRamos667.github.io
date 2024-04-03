<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM vehiculos WHERE Vehículo LIKE '%$termino%' OR Marca LIKE '%$termino%' OR Modelo LIKE '%$termino%' OR fabricación LIKE '%$termino%' OR numeroSerie LIKE '%$termino%' OR tipoCombustible LIKE '%$termino%' OR capacidadCarga LIKE '%$termino%' OR Kilometraje LIKE '%$termino%' OR estadoVehiculo LIKE '%$termino%' OR fechaAdquisicion LIKE '%$termino%' OR valorCompra LIKE '%$termino%' OR Documentos LIKE '%$termino%' OR patente LIKE '%$termino%'";
    $result = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $resultados[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Vehículo</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Vehículo</h2>
    <form action="buscar_vehiculo.php" method="post">
        <label for="termino">Buscar por Nombre de Vehículo, Marca, Modelo, etc.:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Vehículo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Fabricación</th>
                    <th>Número de Serie</th>
                    <th>Tipo de Combustible</th>
                    <th>Capacidad de Carga</th>
                    <th>Kilometraje</th>
                    <th>Estado del Vehículo</th>
                    <th>Fecha de Adquisición</th>
                    <th>Valor de Compra</th>
                    <th>Documentos</th>
                    <th>Patente</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_vehiculo']; ?></td>
                        <td><?php echo $row['Vehículo']; ?></td>
                        <td><?php echo $row['Marca']; ?></td>
                        <td><?php echo $row['Modelo']; ?></td>
                        <td><?php echo $row['fabricación']; ?></td>
                        <td><?php echo $row['numeroSerie']; ?></td>
                        <td><?php echo $row['tipoCombustible']; ?></td>
                        <td><?php echo $row['capacidadCarga']; ?></td>
                        <td><?php echo $row['Kilometraje']; ?></td>
                        <td><?php echo $row['estadoVehiculo']; ?></td>
                        <td><?php echo $row['fechaAdquisicion']; ?></td>
                        <td><?php echo $row['valorCompra']; ?></td>
                        <td><?php echo $row['Documentos']; ?></td>
                        <td><?php echo $row['patente']; ?></td>
                        <td>
                            <a href="modificar_vehiculo.php?id=<?php echo $row['id_vehiculo']; ?>">Modificar</a> |
                            <a href="eliminar_vehiculo.php?id=<?php echo $row['id_vehiculo']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="vehiculo.php">Volver a Vehículos</a>
</body>
</html>
