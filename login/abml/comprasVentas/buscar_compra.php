<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM compraVenta WHERE id_compra = '$termino'";
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
    <title>Buscar Compra</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Compra</h2>
    <form action="buscar_compra.php" method="post">
        <label for="termino">Buscar por Número de Compra:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID Compra</th>
                    <th>ID Proveedor</th>
                    <th>Fecha de Compra</th>
                    <th>Total de la Factura</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_compra']; ?></td>
                        <td><?php echo $row['id_proveedor']; ?></td>
                        <td><?php echo $row['fechaCompra']; ?></td>
                        <td><?php echo $row['totalFactura']; ?></td>
                        <td>
                            <a href="modificar_compra.php?id=<?php echo $row['id_compra']; ?>">Modificar</a> |
                            <a href="eliminar_compra.php?id=<?php echo $row['id_compra']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="compra.php">Volver a Compras</a>
</body>
</html>
