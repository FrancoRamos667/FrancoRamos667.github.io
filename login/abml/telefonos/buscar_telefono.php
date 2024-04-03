<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM telefonos WHERE codArea LIKE '%$termino%' OR numero LIKE '%$termino%'";
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
    <title>Buscar Teléfono</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Teléfono</h2>
    <form action="buscar_telefono.php" method="post">
        <label for="termino">Buscar por Código de Área o Número:</label>
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
                    <th>Número</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_telefono']; ?></td>
                        <td><?php echo $row['codArea']; ?></td>
                        <td><?php echo $row['numero']; ?></td>
                        <td>
                            <a href="modificar_telefono.php?id=<?php echo $row['id_telefono']; ?>">Modificar</a> |
                            <a href="eliminar_telefono.php?id=<?php echo $row['id_telefono']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="telefono.php">Volver a Teléfonos</a>
</body>
</html>
