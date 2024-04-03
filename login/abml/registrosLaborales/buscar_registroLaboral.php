<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el término de búsqueda enviado mediante el método POST
    $termino = $_POST["termino"];

    // Consulta para buscar registros laborales que coincidan con el término de búsqueda
    $query = "SELECT * FROM registrolaboral WHERE id_informacionLaboral = '$termino' OR id_seguridad = '$termino' OR id_capacitacion = '$termino' OR id_ingreso = '$termino' OR id_impuesto = '$termino' OR id_seguro = '$termino' OR id_recursoHumano = '$termino' OR id_riesgo = '$termino'";
    $result = mysqli_query($conexion, $query);

    // Almacenar los resultados de la búsqueda en un array
    while ($row = mysqli_fetch_assoc($result)) {
        $resultados[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Registro Laboral</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Registro Laboral</h2>
    <form action="buscar_registroLaboral.php" method="post">
        <label for="termino">Buscar por ID de Información Laboral, Seguridad, Capacitación, Ingreso, Impuesto, Seguro, Recurso Humano o Riesgo:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (count($resultados) > 0): ?>
            <h3>Resultados de la búsqueda:</h3>
            <table border="1">
                <tr>
                    <th>ID Registro</th>
                    <th>ID Información Laboral</th>
                    <th>ID Seguridad</th>
                    <th>ID Capacitación</th>
                    <th>ID Ingreso</th>
                    <th>ID Impuesto</th>
                    <th>ID Seguro</th>
                    <th>ID Recurso Humano</th>
                    <th>ID Riesgo</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_registro']; ?></td>
                        <td><?php echo $row['id_informacionLaboral']; ?></td>
                        <td><?php echo $row['id_seguridad']; ?></td>
                        <td><?php echo $row['id_capacitacion']; ?></td>
                        <td><?php echo $row['id_ingreso']; ?></td>
                        <td><?php echo $row['id_impuesto']; ?></td>
                        <td><?php echo $row['id_seguro']; ?></td>
                        <td><?php echo $row['id_recursoHumano']; ?></td>
                        <td><?php echo $row['id_riesgo']; ?></td>
                        <td>
                            <a href="modificar_registroLaboral.php?id=<?php echo $row['id_registro']; ?>">Modificar</a> |
                            <a href="eliminar_registroLaboral.php?id=<?php echo $row['id_registro']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="registroLaboral.php">Volver a Listado de Registros Laborales</a>
</body>
</html>
