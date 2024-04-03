<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT id_avanceObra, fechaAvance, descripcionAvance FROM avancesobras WHERE id_avanceObra = '$termino'";
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
    <title>Buscar Avance de Obra</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Avance de Obra</h2>
    <form action="buscar_avanceObra.php" method="post">
        <label for="termino">Buscar por ID de Avance de Obra:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>Número de avance</th>
                    <th>Fecha del avance</th>
                    <th>Descripción del avance</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_avanceObra']; ?></td>
                        <td><?php echo $row['fechaAvance']; ?></td>
                        <td><?php echo $row['descripcionAvance']; ?></td>
                        <td>
                            <a href="modificar_avanceObra.php?id=<?php echo $row['id_avanceObra']; ?>">Modificar</a> |
                            <a href="eliminar_avanceObra.php?id=<?php echo $row['id_avanceObra']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="avanceObra.php">Volver a Avances de Obras</a>
</body>
</html>
