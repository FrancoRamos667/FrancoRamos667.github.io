<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM equiposherramientas WHERE herramienta LIKE '%$termino%'";
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
    <title>Buscar Herramienta</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Herramienta</h2>
    <form action="buscar_herramienta.php" method="post">
        <label for="termino">Buscar por Herramienta:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>Herramienta</th>
                    <th>Tipo de Herramienta</th>
                    <th>Estado</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Peso</th>
                    <th>Material de Herramienta</th>
                    <th>Fecha de Adquisición</th>
                    <th>ID Almacén</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['herramienta']; ?></td>
                        <td><?php echo $row['tipoHerramienta']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td><?php echo $row['marca']; ?></td>
                        <td><?php echo $row['modelo']; ?></td>
                        <td><?php echo $row['peso']; ?></td>
                        <td><?php echo $row['materialHerramienta']; ?></td>
                        <td><?php echo $row['fechaAdquisicion']; ?></td>
                        <td><?php echo $row['id_almacen']; ?></td>
                        <td>
                            <a href="modificar_herramienta.php?id=<?php echo $row['id_herramienta']; ?>">Modificar</a> |
                            <a href="eliminar_herramienta.php?id=<?php echo $row['id_herramienta']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="herramienta.php">Volver a Herramientas</a>
</body>
</html>
