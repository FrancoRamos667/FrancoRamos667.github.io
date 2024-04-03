<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM asignaciones WHERE id_vehiculo = '$termino' OR id_deposito = '$termino'";
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
    <title>Buscar Asignación</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Asignación</h2>
    <form action="buscar_asignacion.php" method="post">
        <label for="termino">Buscar por ID de Vehículo o ID de Depósito:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID Asignación</th>
                    <th>ID Vehículo</th>
                    <th>ID Depósito</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_asignacion']; ?></td>
                        <td><?php echo $row['id_vehiculo']; ?></td>
                        <td><?php echo $row['id_deposito']; ?></td>
                        <td>
                            <a href="modificar_asignacion.php?id=<?php echo $row['id_asignacion']; ?>">Modificar</a> |
                            <a href="eliminar_asignacion.php?id=<?php echo $row['id_asignacion']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="asignaciones.php">Volver a Asignaciones de Vehículos</a>
</body>
</html>
