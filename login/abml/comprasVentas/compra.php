<?php
include 'conexion2.php';

$query = "SELECT * FROM compraVenta";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>compras</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>lista de compras</h2>
    <div class="menu">
        <a href="agregar_compra.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_compra.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Número de compra</th>
        <th>Número de proveedor</th>
        <th>Fecha de compra</th>
        <th>gasto total</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id_compra']; ?></td>
            <td><?php echo $row['id_proveedor']; ?></td>
            <td><?php echo $row['fechaCompra']; ?></td>
            <td><?php echo $row['totalFactura']; ?></td>
            <td>
                <a href="modificar_compra.php?id=<?php echo $row['id_compra']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/modificar.png"></a> |
                <a href="eliminar_compra.php?id=<?php echo $row['id_compra']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/eliminar.png"></a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
</body>
</html>
