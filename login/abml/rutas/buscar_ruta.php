<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM rutas WHERE origen LIKE '%$termino%' OR destino LIKE '%$termino%' OR distancia LIKE '%$termino%' OR duracionEstimada LIKE '%$termino%'";
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
    <title>Buscar Ruta</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Ruta</h2>
    <form action="buscar_ruta.php" method="post">
        <label for="termino">Buscar por Origen, Destino, Distancia o Duración Estimada:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Distancia</th>
                    <th>Duración Estimada</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_ruta']; ?></td>
                        <td><?php echo $row['origen']; ?></td>
                        <td><?php echo $row['destino']; ?></td>
                        <td><?php echo $row['distancia']; ?></td>
                        <td><?php echo $row['duracionEstimada']; ?></td>
                        <td>
                            <a href="modificar_ruta.php?id=<?php echo $row['id_ruta']; ?>">Modificar</a> |
                            <a href="eliminar_ruta.php?id=<?php echo $row['id_ruta']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="ruta.php">Volver a Listado de Rutas</a>
</body>
</html>
