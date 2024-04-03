<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM horarios WHERE 
              descripcion LIKE '%$termino%' OR 
              diasLaborales LIKE '%$termino%'";
    $result = mysqli_query($conexion, $query);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Horario</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Horario</h2>
    <form action="buscar_horario.php" method="post">
        <label for="termino">Buscar por Descripción, Días Laborales, etc.:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table border="1">
                <tr>
                    <th>Hora de Entrada</th>
                    <th>Hora de Salida</th>
                    <th>Días Laborales</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['horaEntrada']; ?></td>
                        <td><?php echo $row['horaSalida']; ?></td>
                        <td><?php echo $row['diasLaborales']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td>
                            <a href="modificar_horario.php?id=<?php echo $row['id_horario']; ?>">Modificar</a> |
                            <a href="eliminar_horario.php?id=<?php echo $row['id_horario']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="horario.php">Volver a Lista de Horarios</a>
</body>
</html>
