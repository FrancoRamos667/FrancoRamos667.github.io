<?php
include 'conexion2.php';

$query = "SELECT * FROM asignaciones";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignaciones de Vehiculos</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Asignaciones de Vehiculos</h2>
    <div class="menu">
        <a href="agregar_asignacion.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_asignacion.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Número de Asignacion</th>
        <th>Número de vehiculo</th>
        <th>Número de deposito</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id_asignacion']; ?></td>
            <td><?php echo $row['id_vehiculo']; ?></td>
            <td><?php echo $row['id_deposito']; ?></td>
            <td>
                <a href="modificar_asignacion.php?id=<?php echo $row['id_asignacion']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/modificar.png"></a> |
                <a href="eliminar_asignacion.php?id=<?php echo $row['id_asignacion']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/eliminar.png"></a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
</body>
</html>
