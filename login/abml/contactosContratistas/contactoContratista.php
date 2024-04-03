<?php
include 'conexion2.php';

$query = "SELECT * FROM Contactoscontratistas";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Contactos de Contratistas</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Contactos de Contratistas</h2>
    <div class="menu">
        <a href="agregar_contactoContratista.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_contactoContratista.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Número de contacto</th>
        <th>Número de contratista</th>
        <th>Cargo</th>
        <th>Correo</th>
        <th>Número de Teléfono</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id_contacto']; ?></td>
            <td><?php echo $row['id_contratista']; ?></td>
            <td><?php echo $row['cargoContacto']; ?></td>
            <td><?php echo $row['correoElectronico']; ?></td>
            <td><?php echo $row['telefonoContacto']; ?></td>
            <td>
                <a href="modificar_contactoContratista.php?id=<?php echo $row['id_contacto']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/modificar.png"></a> |
                <a href="eliminar_contactoContratista.php?id=<?php echo $row['id_contacto']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/eliminar.png"></a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
</body>
</html>
