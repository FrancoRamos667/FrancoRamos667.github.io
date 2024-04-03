<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM seguimientoscontratos WHERE id_contrato LIKE '%$termino%' OR fechaSeguimiento LIKE '%$termino%' OR estadoSeguimiento LIKE '%$termino%' OR observaciones LIKE '%$termino%'";
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
    <title>Buscar Seguimiento de Contrato</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Seguimiento de Contrato</h2>
    <form action="buscar_seguimientoContrato.php" method="post">
        <label for="termino">Buscar por ID de Contrato, Fecha de Seguimiento, Estado de Seguimiento o Observaciones:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>ID del Contrato</th>
                    <th>Fecha de Seguimiento</th>
                    <th>Estado de Seguimiento</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_seguimiento']; ?></td>
                        <td><?php echo $row['id_contrato']; ?></td>
                        <td><?php echo $row['fechaSeguimiento']; ?></td>
                        <td><?php echo $row['estadoSeguimiento']; ?></td>
                        <td><?php echo $row['observaciones']; ?></td>
                        <td>
                            <a href="modificar_seguimientoContrato.php?id=<?php echo $row['id_seguimiento']; ?>">Modificar</a> |
                            <a href="eliminar_seguimientoContrato.php?id=<?php echo $row['id_seguimiento']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="seguimientoContrato.php">Volver a Seguimientos de Contratos</a>
</body>
</html>
