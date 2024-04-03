<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM informacionespersonales WHERE id_trabajador = '$termino' OR id_domicilio = '$termino' OR id_telefono = '$termino' OR id_infoLaboral = '$termino'";
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
    <title>Buscar Datos Personales</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Datos Personales</h2>
    <form action="buscar_datoPersonal.php" method="post">
        <label for="termino">Buscar por ID Trabajador, ID Domicilio, ID Teléfono o ID Información Laboral:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID Información</th>
                    <th>ID Trabajador</th>
                    <th>ID Domicilio</th>
                    <th>ID Teléfono</th>
                    <th>ID Información Laboral</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_info']; ?></td>
                        <td><?php echo $row['id_trabajador']; ?></td>
                        <td><?php echo $row['id_domicilio']; ?></td>
                        <td><?php echo $row['id_telefono']; ?></td>
                        <td><?php echo $row['id_infoLaboral']; ?></td>
                        <td>
                            <a href="modificar_datoPersonal.php?id=<?php echo $row['id_info']; ?>">Modificar</a> |
                            <a href="eliminar_datoPersonal.php?id=<?php echo $row['id_info']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="datoPersonal.php">Volver a Datos Personales</a>
</body>
</html>
