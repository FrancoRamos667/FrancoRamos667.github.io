<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM facturas WHERE descripcionFactura LIKE '%$termino%'";
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
    <title>Buscar Factura</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Factura</h2>
    <form action="buscar_factura.php" method="post">
        <label for="termino">Buscar por Descripción de Factura:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID Factura</th>
                    <th>ID Proveedor</th>
                    <th>Fecha de Emisión</th>
                    <th>Monto Total</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_factura']; ?></td>
                        <td><?php echo $row['id_proveedor']; ?></td>
                        <td><?php echo $row['fechaEmision']; ?></td>
                        <td><?php echo $row['montoTotal']; ?></td>
                        <td><?php echo $row['descripcionFactura']; ?></td>
                        <td><?php echo $row['estadoFactura']; ?></td>
                        <td>
                            <a href="modificar_factura.php?id=<?php echo $row['id_factura']; ?>">Modificar</a> |
                            <a href="eliminar_factura.php?id=<?php echo $row['id_factura']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="factura.php">Volver a Facturas</a>
</body>
</html>
