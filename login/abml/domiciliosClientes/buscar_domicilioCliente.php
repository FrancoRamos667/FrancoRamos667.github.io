<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM domiciliosclientes WHERE barrioCliente LIKE '%$termino%' OR calleCliente LIKE '%$termino%' OR manzanaCliente LIKE '%$termino%' OR casaCliente LIKE '%$termino%'";
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
    <title>Buscar Domicilio de Cliente</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Domicilio de Cliente</h2>
    <form action="buscar_domicilioCliente.php" method="post">
        <label for="termino">Buscar por Barrio, Calle, Manzana o Casa:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>Barrio</th>
                    <th>Calle</th>
                    <th>Manzana</th>
                    <th>Casa</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['barrioCliente']; ?></td>
                        <td><?php echo $row['calleCliente']; ?></td>
                        <td><?php echo $row['manzanaCliente']; ?></td>
                        <td><?php echo $row['casaCliente']; ?></td>
                        <td>
                            <a href="modificar_domicilioCliente.php?id=<?php echo $row['id_domicilioCliente']; ?>">Modificar</a> |
                            <a href="eliminar_domicilioCliente.php?id=<?php echo $row['id_domicilioCliente']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="domicilioCliente.php">Volver a Domicilios de Clientes</a>
</body>
</html>
