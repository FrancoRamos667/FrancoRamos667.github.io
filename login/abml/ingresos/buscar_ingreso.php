<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM ingresos WHERE montoIngreso LIKE '%$termino%' OR fechaIngreso LIKE '%$termino%'";
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
    <title>Buscar Ingreso</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Ingreso</h2>
    <form action="buscar_ingreso.php" method="post">
        <label for="termino">Buscar por Monto o Fecha:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (count($resultados) > 0): ?>
            <h3>Resultados de la búsqueda:</h3>
            <table border="1">
                <tr>
                    <th>ID Ingreso</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_ingreso']; ?></td>
                        <td><?php echo $row['montoIngreso']; ?></td>
                        <td><?php echo $row['fechaIngreso']; ?></td>
                        <td>
                            <a href="modificar_ingreso.php?id=<?php echo $row['id_ingreso']; ?>">Modificar</a> |
                            <a href="eliminar_ingreso.php?id=<?php echo $row['id_ingreso']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="ingreso.php">Volver a Ingresos</a>
</body>
</html>
