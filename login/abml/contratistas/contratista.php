<?php
include 'conexion2.php';

$query = "SELECT * FROM contratistas";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>contratisas</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>lista de contratistas</h2>
    <div class="menu">
        <a href="agregar_contratista.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_contratista.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Número de contratista</th>
        <th>Nombre</th>
        <th>Especialidad</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id_contratista']; ?></td>
            <td><?php echo $row['contratista']; ?></td>
            <td><?php echo $row['especialidad']; ?></td>
            <td>
                <a href="modificar_contratista.php?id=<?php echo $row['id_contratista']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/modificar.png"></a> |
                <a href="eliminar_contratista.php?id=<?php echo $row['id_contratista']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/eliminar.png"></a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
</body>
</html>
