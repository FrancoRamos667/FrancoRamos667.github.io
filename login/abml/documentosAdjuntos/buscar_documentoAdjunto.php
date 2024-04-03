<?php
include 'conexion2.php'; // Incluir el archivo de conexión

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el término de búsqueda del formulario
    $termino = $_POST["termino"];

    // Realizar la consulta para buscar documentos adjuntos que coincidan con el término
    $query = "SELECT * FROM documentosadjuntos WHERE nombreDocumento LIKE '%$termino%'";
    $result = mysqli_query($conexion, $query);

    // Almacenar los resultados en un arreglo
    while ($row = mysqli_fetch_assoc($result)) {
        $resultados[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Documento Adjunto</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleBuscar.css">
</head>
<body>
    <h2>Buscar Documento Adjunto</h2>
    <form action="buscar_documentoAdjunto.php" method="post">
        <label for="termino">Buscar por Nombre de Documento:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <!-- Mostrar resultados de la búsqueda -->
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>ID Documento</th>
                    <th>ID Contrato</th>
                    <th>Nombre Documento</th>
                    <th>Tipo Documento</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_documentoContrato']; ?></td>
                        <td><?php echo $row['id_contrato']; ?></td>
                        <td><?php echo $row['nombreDocumento']; ?></td>
                        <td><?php echo $row['tipoDocumento']; ?></td>
                        <td>
                            <a href="modificar_documentoAdjunto.php?id=<?php echo $row['id_documentoContrato']; ?>">Modificar</a> |
                            <a href="eliminar_documentoAdjunto.php?id=<?php echo $row['id_documentoContrato']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="documentoAdjunto.php">Volver a Documentos Adjuntos</a>
</body>
</html>
