<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM materiales WHERE material LIKE '%$termino%' OR descripcion LIKE '%$termino%' OR cantidadInventario LIKE '%$termino%'";
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
    <title>Buscar Material</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Material</h2>
    <form action="buscar_material.php" method="post">
        <label for="termino">Buscar por Material, Descripción o Cantidad en Inventario:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (count($resultados) > 0): ?>
            <h3>Resultados de la búsqueda:</h3>
            <table border="1">
                <tr>
                    <th>ID Material</th>
                    <th>Material</th>
                    <th>Descripción</th>
                    <th>Cantidad en Inventario</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_material']; ?></td>
                        <td><?php echo $row['material']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['cantidadInventario']; ?></td>
                        <td>
                            <a href="modificar_material.php?id=<?php echo $row['id_material']; ?>">Modificar</a> |
                            <a href="eliminar_material.php?id=<?php echo $row['id_material']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="material.php">Volver a Materiales</a>
</body>
</html>
