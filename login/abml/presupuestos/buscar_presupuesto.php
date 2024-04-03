<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM presupuestos WHERE costoMaterial LIKE '%$termino%' OR costoPersonal LIKE '%$termino%' OR costoTotal LIKE '%$termino%' OR estadoPresupuesto LIKE '%$termino%'";
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
    <title>Buscar Presupuesto</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Presupuesto</h2>
    <form action="buscar_presupuesto.php" method="post">
        <label for="termino">Buscar por Costo Material, Costo Personal, Costo Total o Estado:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (count($resultados) > 0): ?>
            <h3>Resultados de la búsqueda:</h3>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Costo Material</th>
                    <th>Costo Personal</th>
                    <th>Costo Total</th>
                    <th>Estado Presupuesto</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_presupuesto']; ?></td>
                        <td><?php echo $row['costoMaterial']; ?></td>
                        <td><?php echo $row['costoPersonal']; ?></td>
                        <td><?php echo $row['costoTotal']; ?></td>
                        <td><?php echo $row['estadoPresupuesto']; ?></td>
                        <td>
                            <a href="modificar_presupuesto.php?id=<?php echo $row['id_presupuesto']; ?>">Modificar</a> |
                            <a href="eliminar_presupuesto.php?id=<?php echo $row['id_presupuesto']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="presupuesto.php">Volver a Presupuestos</a>
</body>
</html>
