<?php
include 'conexion2.php';

$resultados = [];

// Verificar si se ha enviado un término de búsqueda por método POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["termino"])) {
    $termino = $_POST["termino"];

    // Realizar la consulta para buscar la asignación de contratista por ID de contratista o ID de proyecto
    $query = "SELECT * FROM asignacionescontratistas WHERE id_contratista = '$termino' OR id_proyectoObra = '$termino'";
    $result = mysqli_query($conexion, $query);

    // Almacenar los resultados de la consulta en un arreglo
    while ($row = mysqli_fetch_assoc($result)) {
        $resultados[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Asignación de Contratista</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleBuscar.css">
</head>
<body>
    <h2>Buscar Asignación de Contratista</h2>
    <form action="buscar_asignacionContratista.php" method="post">
        <label for="termino">Buscar por ID de Contratista o ID de Proyecto:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID Asignación de Contratista</th>
                    <th>ID Contratista</th>
                    <th>ID Proyecto Obra</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_asignacionContratista']; ?></td>
                        <td><?php echo $row['id_contratista']; ?></td>
                        <td><?php echo $row['id_proyectoObra']; ?></td>
                        <td>
                            <a href="modificar_asignacionContratista.php?id=<?php echo $row['id_asignacionContratista']; ?>">Modificar</a> |
                            <a href="eliminar_asignacionContratista.php?id=<?php echo $row['id_asignacionContratista']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="asignacionContratista.php">Volver a Asignaciones de Contratistas</a>
</body>
</html>
