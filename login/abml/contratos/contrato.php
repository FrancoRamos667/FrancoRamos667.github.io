<?php
include 'conexion2.php';

$query = "SELECT * FROM contratos";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>contratos</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>lista de contratos</h2>
    <div class="menu">
        <a href="agregar_contrato.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_contrato.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
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
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id_contrato']; ?></td>
            <td><?php echo $row['id_sucursal']; ?></td>
            <td><?php echo $row['id_cliente']; ?></td>
            <td><?php echo $row['id_presupuestos']; ?></td>
            <td><?php echo $row['solicitudCliente']; ?></td>
            <td><?php echo $row['duracionEstimada']; ?></td>
            <td><?php echo $row['id_formaPago']; ?></td>
            <td>
                <a href="modificar_contrato.php?id=<?php echo $row['id_contrato']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/modificar.png"></a> |
                <a href="eliminar_contrato.php?id=<?php echo $row['id_contrato']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/eliminar.png"></a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
</body>
</html>
