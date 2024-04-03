<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Detalles de Compra</title>
    <link rel="stylesheet" type="text/css" href="../aCSS/style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Detalles de Compra</h2>
    <div class="menu">
        <a href="agregar_detalleCompra.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_detalleCompra.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>ID Compra Detalle</th>
        <th>ID Compra</th>
        <th>ID Material</th>
        <th>Precio</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion2.php'; // Ruta relativa al archivo de conexión

    $query = "SELECT * FROM detallecompra";
    $result = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_compraDetalle'] . "</td>";
        echo "<td>" . $row['id_compra'] . "</td>";
        echo "<td>" . $row['id_material'] . "</td>";
        echo "<td>" . $row['precio'] . "</td>";
        echo "<td>
                <a href='modificar_detalleCompra.php?id=" . $row['id_compraDetalle'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href='eliminar_detalleCompra.php?id=" . $row['id_compraDetalle'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
</body>
</html>
