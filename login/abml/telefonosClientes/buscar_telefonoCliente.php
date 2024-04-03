<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM telefonosclientes WHERE codAreaCliente LIKE '%$termino%' OR numCelular LIKE '%$termino%'";
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
    <title>Buscar Teléfono de Cliente</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Teléfono de Cliente</h2>
    <form action="buscar_telefonoCliente.php" method="post">
        <label for="termino">Buscar por Código de Área o Número de Celular:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Código de Área</th>
                    <th>Número de Celular</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_celCliente']; ?></td>
                        <td><?php echo $row['codAreaCliente']; ?></td>
                        <td><?php echo $row['numCelular']; ?></td>
                        <td>
                            <a href="modificar_telefonoCliente.php?id=<?php echo $row['id_celCliente']; ?>">Modificar</a> |
                            <a href="eliminar_telefonoCliente.php?id=<?php echo $row['id_celCliente']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="telefonoCliente.php">Volver a Teléfonos de Clientes</a>
</body>
</html>
