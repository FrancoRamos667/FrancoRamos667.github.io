<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM almacenesdetalles WHERE id_almacenDetalle = '$termino' OR id_compraDetalle = '$termino' OR id_almacen = '$termino'";
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
    <title>Buscar Detalle de Almacén</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Detalle de Almacén</h2>
    <form action="buscar_almacenDetalle.php" method="post">
        <label for="termino">Buscar por Número de Detalle, Número de Compra o Número de Almacén:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID Detalle</th>
                    <th>ID Detalle de Compra</th>
                    <th>ID Almacén</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_almacenDetalle']; ?></td>
                        <td><?php echo $row['id_compraDetalle']; ?></td>
                        <td><?php echo $row['id_almacen']; ?></td>
                        <td>
                            <a href="modificar_almacenDetalle.php?id=<?php echo $row['id_almacenDetalle']; ?>">Modificar</a> |
                            <a href="eliminar_almacenDetalle.php?id=<?php echo $row['id_almacenDetalle']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="almacenDetalle.php">Volver a Detalles de Almacenes</a>
</body>
</html>
