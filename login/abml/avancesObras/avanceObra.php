<?php
include 'conexion2.php';

$query = "SELECT id_avanceObra, fechaAvance, descripcionAvance FROM avancesobras";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Avance de Obras</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Avances de las obras</h2>
    <div class="menu">
        <a href="agregar_avanceObra.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_avanceObra.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Número de avance</th>
        <th>Fecha del avance</th>
        <th>Descripción de avance</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id_avanceObra']; ?></td>
            <td><?php echo $row['fechaAvance']; ?></td>
            <td><?php echo $row['descripcionAvance']; ?></td>
            <td>
                <a href="modificar_avanceObra.php?id=<?php echo $row['id_avanceObra']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/modificar.png"></a> |
                <a href="eliminar_avanceObra.php?id=<?php echo $row['id_avanceObra']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/eliminar.png"></a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
</body>
</html>
