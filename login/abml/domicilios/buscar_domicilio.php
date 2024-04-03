<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM domicilios WHERE barrio LIKE '%$termino%' OR manzana LIKE '%$termino%' OR casa LIKE '%$termino%' OR calle LIKE '%$termino%'";
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
    <title>Buscar Domicilio</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Domicilio</h2>
    <form action="eliminar_buscar_domicilio.php" method="post">
        <label for="termino">Buscar por Barrio, Manzana, Casa o Calle:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>Barrio</th>
                    <th>Manzana</th>
                    <th>Casa</th>
                    <th>Calle</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['barrio']; ?></td>
                        <td><?php echo $row['manzana']; ?></td>
                        <td><?php echo $row['casa']; ?></td>
                        <td><?php echo $row['calle']; ?></td>
                        <td>
                            <a href="agregar_modificar_domicilio.php?id=<?php echo $row['id_domicilio']; ?>">Modificar</a> |
                            <a href="eliminar_buscar_domicilio.php?id=<?php echo $row['id_domicilio']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="domicilio.php">Volver a Domicilios</a>
</body>
</html>
