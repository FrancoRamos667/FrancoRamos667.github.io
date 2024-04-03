<?php
include 'conexion2.php';

$query = "SELECT * FROM almacenesdetalles";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de los almacenes</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Detalles de los almacenes</h2>
    <div class="menu">
        <a href="agregar_almacenDetalle.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_almacenDetalle.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Número de Almacen</th>
        <th>Número de detalle de compra</th>
        <th>Número de Almacen</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id_almacenDetalle']; ?></td>
            <td><?php echo $row['id_compraDetalle']; ?></td>
            <td><?php echo $row['id_almacen']; ?></td>
            <td>
                <a href="modificar_almacenDetalle.php?id=<?php echo $row['id_almacenDetalle']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/modificar.png"></a> |
                <a href="eliminar_almacenDetalle.php?id=<?php echo $row['id_almacenDetalle']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/eliminar.png"></a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
</body>
</html>
