<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Vehículos</title>
</head>
<style>
   /* Estilos para la tabla */
   table {
        width: 100%;
        border-collapse: collapse;
        color: black; /* Cambiar el color del texto a negro */
        -webkit-text-stroke: 1px black;
    }

    /* Estilos para las filas pares e impares */
    tr:nth-child(even) {
        background-color: #1889d4;
    }

    /* Estilos para el encabezado de la tabla */
    th {
        background-color: #185ef7e5;
    }

    a:hover {
        text-decoration: underline;
    }

    h2 {
        display: flex;
        justify-content: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        color: black; /* Cambiar el color del texto a negro */
        margin: 10px;
    }

    img {
        width: 50px;
        height: 50px;
    }

    /* Estilos para el contenedor del menú */
    .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    font-size: 30px;
    background-color: rgb(142, 142, 145);
    width: 128%; /* Asegura que el contenedor ocupe todo el ancho */
    }

/* Estilos para el menú */
    .menu {
        display: flex;
        align-items: center;
        margin-left: auto; /* Alinea el menú a la derecha */
    }

    /* Estilos para los enlaces del menú */
    .menu a {
        text-decoration: none;
        margin-left: 20px;
        color: black; /* Cambiar el color del texto a negro */
    }

    /* Estilos para los enlaces del menú al pasar el ratón */
    .menu a:hover {
        color: #ECA219;
    }

    table {
        border-color: black;
    }

    th, td {
        padding: 8px;
        text-align: left;
        font-size: 25px;
    }
</style>
<body>

<div class="container">
    <h2>Listado de Vehículos</h2>
    <div class="menu">
        <a href="agregar_vehiculo.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_vehiculo.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Vehículo</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Fabricación</th>
        <th>Número de Serie</th>
        <th>Tipo Combustible</th>
        <th>Capacidad Carga</th>
        <th>Kilometraje</th>
        <th>Estado Vehículo</th>
        <th>Fecha Adquisición</th>
        <th>Valor de Compra</th>
        <th>Documentos</th>
        <th>Patente</th>
        <th>Acciones</th>
    </tr>
    <?php
    include 'conexion2.php'; // Ruta relativa al archivo de conexión

    $query = "SELECT * FROM vehiculos";
    $result = mysqli_query($conexion, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Vehículo'] . "</td>";
        echo "<td>" . $row['Marca'] . "</td>";
        echo "<td>" . $row['Modelo'] . "</td>";
        echo "<td>" . $row['fabricación'] . "</td>";
        echo "<td>" . $row['numeroSerie'] . "</td>";
        echo "<td>" . $row['tipoCombustible'] . "</td>";
        echo "<td>" . $row['capacidadCarga'] . "</td>";
        echo "<td>" . $row['Kilometraje'] . "</td>";
        echo "<td>" . $row['estadoVehiculo'] . "</td>";
        echo "<td>" . $row['fechaAdquisicion'] . "</td>";
        echo "<td>" . $row['valorCompra'] . "</td>";
        echo "<td>" . $row['Documentos'] . "</td>";
        echo "<td>" . $row['patente'] . "</td>";
        echo "<td>
                <a href='modificar_vehiculo.php?id=" . $row['id_vehiculo'] . "'><img src='http://localhost/constructora/login/abml/aCSS/modificar.png'></a> |
                <a href='eliminar_vehiculo.php?id=" . $row['id_vehiculo'] . "'><img src='http://localhost/constructora/login/abml/aCSS/eliminar.png'></a>
            </td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
</body>
</html>
