<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM informacioneslaborales WHERE 
              fechaInicio LIKE '%$termino%' OR 
              faltas LIKE '%$termino%' OR 
              id_horario LIKE '%$termino%'";
    $result = mysqli_query($conexion, $query);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Dato Laboral</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Dato Laboral</h2>
    <form action="buscar_datoLaboral.php" method="post">
        <label for="termino">Buscar por Fecha de Inicio, Faltas o ID de Horario:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID Laboral</th>
                    <th>Fecha de Inicio</th>
                    <th>Faltas</th>
                    <th>ID Horario</th>
                    <th>Acciones</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id_infoLaboral']; ?></td>
                        <td><?php echo $row['fechaInicio']; ?></td>
                        <td><?php echo $row['faltas']; ?></td>
                        <td><?php echo $row['id_horario']; ?></td>
                        <td>
                            <a href="modificar_datoLaboral.php?id=<?php echo $row['id_infoLaboral']; ?>">Modificar</a> |
                            <a href="eliminar_datoLaboral.php?id=<?php echo $row['id_infoLaboral']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="datoLaboral.php">Volver a Lista de Datos Laborales</a>
</body>
</html>
