<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM capacitaciones WHERE detalleCapacitacion LIKE '%$termino%'";
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
    <title>Buscar Capacitación</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Capacitación</h2>
    <form action="buscar_capacitacion.php" method="post">
        <label for="termino">Buscar por Detalles de la Capacitación:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Detalles de la Capacitación</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_capacitacion']; ?></td>
                        <td><?php echo $row['detalleCapacitacion']; ?></td>
                        <td>
                            <a href="modificar_capacitacion.php?id=<?php echo $row['id_capacitacion']; ?>">Modificar</a> |
                            <a href="eliminar_capacitacion.php?id=<?php echo $row['id_capacitacion']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="capacitacion.php">Volver a Avances de las Obras</a>
</body>
</html>
