<?php
include 'conexion2.php';

$query = "SELECT * FROM informacioneslaborales";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Datos Laborales</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Datos Laborales</h2>
    <div class="menu">
        <a href="agregar_datoLaboral.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_datoLaboral.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>ID Laboral</th>
        <th>Fecha Inicio</th>
        <th>Faltas</th>
        <th>ID Horario</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id_infoLaboral']; ?></td>
            <td><?php echo $row['fechaInicio']; ?></td>
            <td><?php echo $row['faltas']; ?></td>
            <td><?php echo $row['id_horario']; ?></td>
            <td>
                <a href="modificar_datoLaboral.php?id=<?php echo $row['id_infoLaboral']; ?>"><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href="eliminar_datoLaboral.php?id=<?php echo $row['id_infoLaboral']; ?>"><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
</body>
</html>
