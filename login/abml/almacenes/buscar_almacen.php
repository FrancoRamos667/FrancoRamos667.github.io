<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM almacenes WHERE numeroEstante = '$termino'";
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
    <title>Buscar Almacén</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Almacén</h2>
    <form action="buscar_almacen.php" method="post">
        <label for="termino">Buscar por Número de Estante:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Número de Estante</th>
                    <th>Sección</th>
                    <th>Capacidad Máxima</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_almacen']; ?></td>
                        <td><?php echo $row['numeroEstante']; ?></td>
                        <td><?php echo $row['seccion']; ?></td>
                        <td><?php echo $row['capacidadMaxima']; ?></td>
                        <td><?php echo $row['observaciones']; ?></td>
                        <td>
                            <a href="modificar_almacen.php?id=<?php echo $row['id_almacen']; ?>">Modificar</a> |
                            <a href="eliminar_almacen.php?id=<?php echo $row['id_almacen']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="almacen.php">Volver a Almacenes</a>
</body>
</html>
