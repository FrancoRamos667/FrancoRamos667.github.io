<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Herramientas</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">
</head>
<body>

<div class="container">
    <h2>Listado de Herramientas</h2>
    <div class="menu">
        <a href="agregar_herramienta.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_herramienta.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>ID Herramienta</th>
        <th>Herramienta</th>
        <th>Tipo de Herramienta</th>
        <th>Estado</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Peso</th>
        <th>Material</th>
        <th>Fecha de Adquisición</th>
        <th>ID Almacén</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion2.php'; // Ruta relativa al archivo de conexión

    $query = "SELECT * FROM equiposherramientas";
    $result = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_herramienta'] . "</td>";
        echo "<td>" . $row['herramienta'] . "</td>";
        echo "<td>" . $row['tipoHerramienta'] . "</td>";
        echo "<td>" . $row['estado'] . "</td>";
        echo "<td>" . $row['marca'] . "</td>";
        echo "<td>" . $row['modelo'] . "</td>";
        echo "<td>" . $row['peso'] . "</td>";
        echo "<td>" . $row['materialHerramienta'] . "</td>";
        echo "<td>" . $row['fechaAdquisicion'] . "</td>";
        echo "<td>" . $row['id_almacen'] . "</td>";
        echo "<td>
                <a href='modificar_herramienta.php?id=" . $row['id_herramienta'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href='eliminar_herramienta.php?id=" . $row['id_herramienta'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
</body>
</html>
