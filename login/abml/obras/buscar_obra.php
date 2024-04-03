<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM obras WHERE 
              id_obra LIKE '%$termino%' OR 
              id_sucursal LIKE '%$termino%' OR 
              obra LIKE '%$termino%' OR 
              fechaObra LIKE '%$termino%'";
    $result = mysqli_query($conexion, $query);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Obra</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Obra</h2>
    <form action="buscar_obra.php" method="post">
        <label for="termino">Buscar por Número de Obra, Número de Sucursal, Nombre de Obra o Fecha de Obra:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table border="1">
                <tr>
                    <th>N° Obra</th>
                    <th>N° Sucursal</th>
                    <th>Obra</th>
                    <th>Fecha de Obra</th>
                    <th>Acciones</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id_obra']; ?></td>
                        <td><?php echo $row['id_sucursal']; ?></td>
                        <td><?php echo $row['obra']; ?></td>
                        <td><?php echo $row['fechaObra']; ?></td>
                        <td>
                            <a href="modificar_obra.php?id=<?php echo $row['id_obra']; ?>">Modificar</a> |
                            <a href="eliminar_obra.php?id=<?php echo $row['id_obra']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="obra.php">Volver a Lista de Obras</a>
</body>
</html>
