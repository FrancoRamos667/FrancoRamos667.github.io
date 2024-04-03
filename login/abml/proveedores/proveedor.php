<?php
include 'conexion2.php';

$query = "SELECT * FROM proveedores";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Proveedores</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Proveedores</h2>
    <div class="menu">
        <a href="agregar_proveedor.php">Agregar Proveedor</a>
    </div>
</div>

<table border="3">
    <tr>
        <th>ID</th>
        <th>Contacto</th>
        <th>Producto</th>
        <th>Precio por Unidad</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id_proveedor']; ?></td>
            <td><?php echo $row['Contacto']; ?></td>
            <td><?php echo $row['Producto']; ?></td>
            <td><?php echo $row['PrecioUnidad']; ?></td>
            <td>
                <a href="modificar_proveedor.php?id=<?php echo $row['id_proveedor']; ?>">Modificar</a> |
                <a href="eliminar_proveedor.php?id=<?php echo $row['id_proveedor']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
