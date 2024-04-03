<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM horariosDepositos WHERE 
              fechaOperacion LIKE '%$termino%' OR 
              horarioOperacion LIKE '%$termino%' OR 
              horarioMantenimiento LIKE '%$termino%'";
    $result = mysqli_query($conexion, $query);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Horario de Depósito</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Horario de Depósito</h2>
    <form action="buscar_horarioDeposito.php" method="post">
        <label for="termino">Buscar por Fecha de Operación, Horario de Operación o Horario de Mantenimiento:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table border="1">
                <tr>
                    <th>Fecha de Operación</th>
                    <th>Horario de Operación</th>
                    <th>Horario de Mantenimiento</th>
                    <th>Acciones</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['fechaOperacion']; ?></td>
                        <td><?php echo $row['horarioOperacion']; ?></td>
                        <td><?php echo $row['horarioMantenimiento']; ?></td>
                        <td>
                            <a href="modificar_horarioDeposito.php?id=<?php echo $row['id_horarioDeposito']; ?>">Modificar</a> |
                            <a href="eliminar_horarioDeposito.php?id=<?php echo $row['id_horarioDeposito']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="horarioDeposito.php">Volver a Lista de Horarios de Depósito</a>
</body>
</html>
