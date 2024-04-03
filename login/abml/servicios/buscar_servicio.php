<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM servicios WHERE mantenimiento LIKE '%$termino%' OR otrosServicio LIKE '%$termino%'";
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
    <title>Buscar Servicio</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Servicio</h2>
    <form action="buscar_servicio.php" method="post">
        <label for="termino">Buscar por Mantenimiento u Otros Servicios:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Mantenimiento</th>
                    <th>Otros Servicios</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_servicio']; ?></td>
                        <td><?php echo $row['mantenimiento']; ?></td>
                        <td><?php echo $row['otrosServicio']; ?></td>
                        <td>
                            <a href="modificar_servicio.php?id=<?php echo $row['id_servicio']; ?>">Modificar</a> |
                            <a href="eliminar_servicio.php?id=<?php echo $row['id_servicio']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="servicio.php">Volver a Servicios</a>
</body>
</html>
