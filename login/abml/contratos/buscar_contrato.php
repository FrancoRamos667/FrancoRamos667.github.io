<?php
include 'conexion2.php';

$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $termino = $_POST["termino"];

    $query = "SELECT * FROM contratos WHERE 
              id_sucursal LIKE '%$termino%' OR 
              id_cliente LIKE '%$termino%' OR 
              id_presupuestos LIKE '%$termino%' OR 
              solicitudCliente LIKE '%$termino%' OR 
              duracionEstimada LIKE '%$termino%' OR 
              id_formaPago LIKE '%$termino%'";
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
    <title>Buscar Contrato</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/styleBuscar.css">
</head>
<body>
    <h2>Buscar Contrato</h2>
    <form action="buscar_contrato.php" method="post">
        <label for="termino">Buscar por Nombre o Especialidad:</label>
        <input type="text" id="termino" name="termino" required>
        <input type="submit" value="Buscar">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Resultados de la búsqueda:</h3>
        <?php if (count($resultados) > 0): ?>
            <table border="1">
                <tr>
                    <th>Número de contrato</th>
                    <th>Número de sucursal</th>
                    <th>Número de cliente</th>
                    <th>Número de presupuesto</th>
                    <th>Solicitud cliente</th>
                    <th>Duracion estimada</th>
                    <th>Número de forma pago</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($resultados as $row): ?>
                    <tr>
                        <td><?php echo $row['id_contrato']; ?></td>
                        <td><?php echo $row['id_sucursal']; ?></td>
                        <td><?php echo $row['id_cliente']; ?></td>
                        <td><?php echo $row['id_presupuestos']; ?></td>
                        <td><?php echo $row['solicitudCliente']; ?></td>
                        <td><?php echo $row['duracionEstimada']; ?></td>
                        <td><?php echo $row['id_formaPago']; ?></td>
                        <td>
                            <a href="modificar_contrato.php?id=<?php echo $row['id_contrato']; ?>">Modificar</a> |
                            <a href="eliminar_contrato.php?id=<?php echo $row['id_contrato']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    <?php endif; ?>

    <a href="contrato.php">Volver a Lista de Contratos</a>
</body>
</html>
