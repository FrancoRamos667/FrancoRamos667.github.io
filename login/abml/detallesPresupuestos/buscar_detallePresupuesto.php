<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM detallesPresupuestos WHERE 
              descripcionDetalle LIKE '%$termino%' OR 
              cantidadPresupuesto LIKE '%$termino%' OR 
              precioUnitarioPresupuesto LIKE '%$termino%'";
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
    <title>Buscar Detalle de Presupuesto</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleBuscar.css">
</head>
<body>
    <h2>Buscar Detalle de Presupuesto</h2>
    <form action="buscar_detallePresupuesto.php" method="post">
        <label for="termino">Buscar por Descripción, Cantidad o Precio Unitario:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID Detalle Presupuesto</th>
                    <th>Descripción</th>
                    <th>Cantidad Presupuesto</th>
                    <th>Precio unitario</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_detallePresupuesto']; ?></td>
                        <td><?php echo $row['descripcionDetalle']; ?></td>
                        <td><?php echo $row['cantidadPresupuesto']; ?></td>
                        <td><?php echo $row['precioUnitarioPresupuesto']; ?></td>
                        <td>
                            <a href="modificar_detallePresupuesto.php?id=<?php echo $row['id_detallePresupuesto']; ?>">Modificar</a> |
                            <a href="eliminar_detallePresupuesto.php?id=<?php echo $row['id_detallePresupuesto']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="detallePresupuesto.php">Volver a Lista de Detalles de Presupuestos</a>
</body>
</html>
