<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Facturas</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Facturas</h2>
    <div class="menu">
        <a href="agregar_factura.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_factura.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>ID Factura</th>
        <th>ID Proveedor</th>
        <th>Fecha de Emisión</th>
        <th>Monto Total</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion2.php';

    $query = "SELECT * FROM facturas";
    $result = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_factura'] . "</td>";
        echo "<td>" . $row['id_proveedor'] . "</td>";
        echo "<td>" . $row['fechaEmision'] . "</td>";
        echo "<td>" . $row['montoTotal'] . "</td>";
        echo "<td>" . $row['descripcionFactura'] . "</td>";
        echo "<td>" . $row['estadoFactura'] . "</td>";
        echo "<td>
                <a href='modificar_factura.php?id=" . $row['id_factura'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href='eliminar_factura.php?id=" . $row['id_factura'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
</body>
</html>
