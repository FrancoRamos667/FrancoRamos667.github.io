<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM seguridadeslaborales WHERE detalleSeguridad LIKE '%$termino%'";
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
    <title>Buscar Detalles de Seguridad Laboral</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Detalles de Seguridad Laboral</h2>
    <form action="buscar_seguridadLaboral.php" method="post">
        <label for="termino">Buscar por Detalles de Seguridad Laboral:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Detalles de Seguridad Laboral</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_seguridad']; ?></td>
                        <td><?php echo $row['detalleSeguridad']; ?></td>
                        <td>
                            <a href="modificar_seguridadLaboral.php?id=<?php echo $row['id_seguridad']; ?>">Modificar</a> |
                            <a href="eliminar_seguridadLaboral.php?id=<?php echo $row['id_seguridad']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="seguridadLaboral.php">Volver a Detalles de Seguridad Laboral</a>
</body>
</html>
