<?php
include 'conexion2.php';

$query = "SELECT * FROM recursoshumanos";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Recursos Humanos</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Recursos Humanos</h2>
    <div class="menu">
        <a href="agregar_recursoHumano.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_recursoHumano.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>ID</th>
        <th>Departamento</th>
        <th>Cargo</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id_recursoHumano']; ?></td>
            <td><?php echo $row['departamento']; ?></td>
            <td><?php echo $row['cargo']; ?></td>
            <td>
                <a href="modificar_recursoHumano.php?id=<?php echo $row['id_recursoHumano']; ?>"><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href="eliminar_recursoHumano.php?id=<?php echo $row['id_recursoHumano']; ?>"><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
