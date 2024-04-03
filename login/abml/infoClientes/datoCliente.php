<?php
include 'conexion2.php';

$query = "SELECT * FROM informacionesclientes";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Datos de Cliente</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Datos de Cliente</h2>
    <div class="menu">
        <a href="agregar_datoCliente.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_datoCliente.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

    <table border="3">
        <tr>
            <th>ID Cliente</th>
            <th>ID Domicilio</th>
            <th>ID Celular</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id_cliente']; ?></td>
                <td><?php echo $row['id_domicilioCliente']; ?></td>
                <td><?php echo $row['id_celCliente']; ?></td>
                <td>
                    <a href="modificar_datoCliente.php?id=<?php echo $row['id_infoCliente']; ?>">Modificar</a> |
                    <a href="eliminar_datoCliente.php?id=<?php echo $row['id_infoCliente']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
</body>
</html>
