<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM formaspagos WHERE metodoPago LIKE '%$termino%'";
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
    <title>Buscar Forma de Pago</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Forma de Pago</h2>
    <form action="buscar_formaPago.php" method="post">
        <label for="termino">Buscar por Método de Pago:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>Fecha de Pago</th>
                    <th>Monto de Pago</th>
                    <th>Método de Pago</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['fechaPago']; ?></td>
                        <td><?php echo $row['montoPago']; ?></td>
                        <td><?php echo $row['metodoPago']; ?></td>
                        <td>
                            <a href="modificar_formaPago.php?id=<?php echo $row['id_formaPago']; ?>">Modificar</a> |
                            <a href="eliminar_formaPago.php?id=<?php echo $row['id_formaPago']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="formaPago.php">Volver a Formas de Pago</a>
</body>
</html>
