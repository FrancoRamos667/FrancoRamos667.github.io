<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM informacionesclientes WHERE id_cliente = '$termino' OR id_domicilioCliente = '$termino' OR id_celCliente = '$termino'";
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
    <title>Buscar Datos de Cliente</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Datos de Cliente</h2>
    <form action="buscar_datoCliente.php" method="post">
        <label for="termino">Buscar por ID Cliente, ID Domicilio o ID Celular:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID Cliente</th>
                    <th>ID Domicilio</th>
                    <th>ID Celular</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_cliente']; ?></td>
                        <td><?php echo $row['id_domicilioCliente']; ?></td>
                        <td><?php echo $row['id_celCliente']; ?></td>
                        <td>
                            <a href="modificar_datoCliente.php?id=<?php echo $row['id_infoCliente']; ?>">Modificar</a> |
                            <a href="eliminar_datoCliente.php?id=<?php echo $row['id_infoCliente']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="datoCliente.php">Volver a Datos de Cliente</a>
</body>
</html>
