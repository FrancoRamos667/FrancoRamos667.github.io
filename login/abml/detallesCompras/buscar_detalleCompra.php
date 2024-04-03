<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM detallecompra WHERE id_compraDetalle LIKE '%$termino%' OR id_compra LIKE '%$termino%' OR id_material LIKE '%$termino%' OR precio LIKE '%$termino%'";
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
    <title>Buscar Detalle de Compra</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleBuscar.css">
</head>
<body>
    <h2>Buscar Detalle de Compra</h2>
    <form action="buscar_detalleCompra.php" method="post">
        <label for="termino">Buscar por ID de Compra, ID de Material o Precio:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID Compra Detalle</th>
                    <th>ID Compra</th>
                    <th>ID Material</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_compraDetalle']; ?></td>
                        <td><?php echo $row['id_compra']; ?></td>
                        <td><?php echo $row['id_material']; ?></td>
                        <td><?php echo $row['precio']; ?></td>
                        <td>
                            <a href="modificar_detalleCompra.php?id=<?php echo $row['id_compraDetalle']; ?>">Modificar</a> |
                            <a href="eliminar_detalleCompra.php?id=<?php echo $row['id_compraDetalle']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="detalleCompra.php">Volver a Detalles de Compra</a>
</body>
</html>
