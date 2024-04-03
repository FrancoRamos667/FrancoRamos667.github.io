<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM contratistas WHERE contratista LIKE '%$termino%' OR especialidad LIKE '%$termino%'";
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
    <title>Buscar Contratista</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Contratista</h2>
    <form action="buscar_contratista.php" method="post">
        <label for="termino">Buscar por Nombre o Especialidad:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>Número de contratista</th>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_contratista']; ?></td>
                        <td><?php echo $row['contratista']; ?></td>
                        <td><?php echo $row['especialidad']; ?></td>
                        <td>
                            <a href="modificar_contratista.php?id=<?php echo $row['id_contratista']; ?>">Modificar</a> |
                            <a href="eliminar_contratista.php?id=<?php echo $row['id_contratista']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="contratista.php">Volver a Lista de Contratistas</a>
</body>
</html>
