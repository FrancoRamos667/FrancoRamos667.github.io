<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM detallesdepositos WHERE id_deposito LIKE '%$termino%' OR accesibilidad LIKE '%$termino%' OR edificio LIKE '%$termino%'";
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
    <title>Buscar Detalle de Depósito</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleBuscar.css">
</head>
<body>
    <h2>Buscar Detalle de Depósito</h2>
    <form action="buscar_detalleDeposito.php" method="post">
        <label for="termino">Buscar por ID de Depósito, Accesibilidad o Edificio:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID Detalle Depósito</th>
                    <th>ID Depósito</th>
                    <th>Accesibilidad</th>
                    <th>Edificio</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_detalleDeposito']; ?></td>
                        <td><?php echo $row['id_deposito']; ?></td>
                        <td><?php echo $row['accesibilidad']; ?></td>
                        <td><?php echo $row['edificio']; ?></td>
                        <td>
                            <a href="modificar_detalleDeposito.php?id=<?php echo $row['id_detalleDeposito']; ?>">Modificar</a> |
                            <a href="eliminar_detalleDeposito.php?id=<?php echo $row['id_detalleDeposito']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="detalleDeposito.php">Volver a Detalles de Depósito</a>
</body>
</html>
