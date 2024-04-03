<?php
include 'conexion.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM sucursal WHERE sucursal = '$termino'";
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
    <title>Buscar Sucursal</title>
    <link rel="stylesheet" type="text/css" href="abml\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Sucursal</h2>
    <form action="buscar_sucursal.php" method="post">
        <label for="termino">Buscar por Nombre de Sucursal:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Sucursal</th>
                    <th>Ubicación</th>
                    <th>Tamaño</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_sucursal']; ?></td>
                        <td><?php echo $row['sucursal']; ?></td>
                        <td><?php echo $row['ubicacion']; ?></td>
                        <td><?php echo $row['tamaño']; ?></td>
                        <td>
                            <a href="modificar_sucursal.php?id=<?php echo $row['id_sucursal']; ?>">Modificar</a> |
                            <a href="eliminar_sucursal.php?id=<?php echo $row['id_sucursal']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="ingreso.php">Volver a Sucursales</a>
</body>
</html>
