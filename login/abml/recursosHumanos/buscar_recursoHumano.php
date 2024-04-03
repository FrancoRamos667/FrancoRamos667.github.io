<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM recursoshumanos WHERE departamento LIKE '%$termino%' OR cargo LIKE '%$termino%'";
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
    <title>Buscar Recurso Humano</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleBuscar.css">
</head>
<body>
    <h2>Buscar Recurso Humano</h2>
    <form action="buscar_recursoHumano.php" method="post">
        <label for="termino">Buscar por Departamento o Cargo:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_recursoHumano']; ?></td>
                        <td><?php echo $row['departamento']; ?></td>
                        <td><?php echo $row['cargo']; ?></td>
                        <td>
                            <a href="modificar_recursoHumano.php?id=<?php echo $row['id_recursoHumano']; ?>">Modificar</a> |
                            <a href="eliminar_recursoHumano.php?id=<?php echo $row['id_recursoHumano']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="recursoHumano.php">Volver a Recursos Humanos</a>
</body>
</html>
