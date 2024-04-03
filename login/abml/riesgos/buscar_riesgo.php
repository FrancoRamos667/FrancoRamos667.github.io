<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM riesgos WHERE riesgo LIKE '%$termino%' OR cumplimiento LIKE '%$termino%'";
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
    <title>Buscar Riesgo</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Riesgo</h2>
    <form action="buscar_riesgo.php" method="post">
        <label for="termino">Buscar por Riesgo o Cumplimiento:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Riesgo</th>
                    <th>Cumplimiento</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_riesgo']; ?></td>
                        <td><?php echo $row['riesgo']; ?></td>
                        <td><?php echo $row['cumplimiento']; ?></td>
                        <td>
                            <a href="modificar_riesgo.php?id=<?php echo $row['id_riesgo']; ?>">Modificar</a> |
                            <a href="eliminar_riesgo.php?id=<?php echo $row['id_riesgo']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="riesgo.php">Volver a Listado de Riesgos</a>
</body>
</html>
