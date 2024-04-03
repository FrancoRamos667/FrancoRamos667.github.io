<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM impuestos WHERE tipoImpuesto LIKE '%$termino%'";
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
    <title>Buscar Impuesto</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Impuesto</h2>
    <form action="buscar_impuesto.php" method="post">
        <label for="termino">Buscar por Tipo de Impuesto:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>Tipo Impuesto</th>
                    <th>Monto Impuesto</th>
                    <th>Fecha Impuesto</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['tipoImpuesto']; ?></td>
                        <td><?php echo $row['montoImpuesto']; ?></td>
                        <td><?php echo $row['fechaImpuesto']; ?></td>
                        <td>
                            <a href="modificar_impuesto.php?id=<?php echo $row['id_impuesto']; ?>">Modificar</a> |
                            <a href="eliminar_impuesto.php?id=<?php echo $row['id_impuesto']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="impuesto.php">Volver a Impuestos</a>
</body>
</html>
