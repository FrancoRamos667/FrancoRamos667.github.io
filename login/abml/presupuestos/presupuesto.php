<?php
include 'conexion2.php';

$query = "SELECT * FROM presupuestos";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Presupuestos</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Presupuestos</h2>
    <div class="menu">
        <a href="agregar_presupuesto.php">Agregar Presupuesto</a>
    </div>
</div>

<table border="3">
    <tr>
        <th>ID</th>
        <th>Costo Material</th>
        <th>Costo Personal</th>
        <th>Costo Total</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id_presupuesto']; ?></td>
            <td><?php echo $row['costoMaterial']; ?></td>
            <td><?php echo $row['costoPersonal']; ?></td>
            <td><?php echo $row['costoTotal']; ?></td>
            <td><?php echo $row['estadoPresupuesto']; ?></td>
            <td>
                <a href="modificar_presupuesto.php?id=<?php echo $row['id_presupuesto']; ?>">Modificar</a> |
                <a href="eliminar_presupuesto.php?id=<?php echo $row['id_presupuesto']; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
