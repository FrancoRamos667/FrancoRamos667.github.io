<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM proveedores WHERE Contacto LIKE '%$termino%' OR Producto LIKE '%$termino%' OR PrecioUnidad LIKE '%$termino%'";
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
    <title>Buscar Proveedor</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Proveedor</h2>
    <form action="buscar_proveedor.php" method="post">
        <label for="termino">Buscar por Contacto, Producto o Precio por Unidad:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (count($resultados) > 0): ?>
            <h3>Resultados de la búsqueda:</h3>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Contacto</th>
                    <th>Producto</th>
                    <th>Precio por Unidad</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_proveedor']; ?></td>
                        <td><?php echo $row['Contacto']; ?></td>
                        <td><?php echo $row['Producto']; ?></td>
                        <td><?php echo $row['PrecioUnidad']; ?></td>
                        <td>
                            <a href="modificar_proveedor.php?id=<?php echo $row['id_proveedor']; ?>">Modificar</a> |
                            <a href="eliminar_proveedor.php?id=<?php echo $row['id_proveedor']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="proveedor.php">Volver a Proveedores</a>
</body>
</html>
