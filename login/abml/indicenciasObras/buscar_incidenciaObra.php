<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM incidenciasobras WHERE tipoIncidencia LIKE '%$termino%' OR descripcionIncidente LIKE '%$termino%'";
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
    <title>Buscar Incidencia en Obra</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Incidencia en Obra</h2>
    <form action="buscar_incidenciaObra.php" method="post">
        <label for="termino">Buscar por Tipo o Descripción de Incidencia:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>Fecha Incidencia</th>
                    <th>Tipo Incidencia</th>
                    <th>Descripción Incidente</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['fechaIncidencia']; ?></td>
                        <td><?php echo $row['tipoIncidencia']; ?></td>
                        <td><?php echo $row['descripcionIncidente']; ?></td>
                        <td>
                            <a href="modificar_incidenciaObra.php?id=<?php echo $row['id_incidencia']; ?>">Modificar</a> |
                            <a href="eliminar_incidenciaObra.php?id=<?php echo $row['id_incidencia']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="incidenciaObra.php">Volver a Incidencias en Obras</a>
</body>
</html>
