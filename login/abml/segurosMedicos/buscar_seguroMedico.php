<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM segurosmedicos WHERE tipoSeguro LIKE '%$termino%' OR cobertura LIKE '%$termino%' OR fechaSeguro LIKE '%$termino%'";
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
    <title>Buscar Seguro Médico</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Seguro Médico</h2>
    <form action="buscar_seguroMedico.php" method="post">
        <label for="termino">Buscar por Tipo de Seguro, Cobertura o Fecha de Seguro:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Tipo de Seguro</th>
                    <th>Cobertura</th>
                    <th>Fecha de Seguro</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_seguro']; ?></td>
                        <td><?php echo $row['tipoSeguro']; ?></td>
                        <td><?php echo $row['cobertura']; ?></td>
                        <td><?php echo $row['fechaSeguro']; ?></td>
                        <td>
                            <a href="modificar_seguroMedico.php?id=<?php echo $row['id_seguro']; ?>">Modificar</a> |
                            <a href="eliminar_seguroMedico.php?id=<?php echo $row['id_seguro']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="seguroMedico.php">Volver a Seguros Médicos</a>
</body>
</html>
