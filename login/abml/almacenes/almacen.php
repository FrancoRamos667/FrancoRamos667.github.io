<?php
include 'conexion2.php';

$query = "SELECT * FROM almacenes";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Almacenes</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\style.css">

    <style>
        * {
    margin: 0;
    padding: 0;
}

/* Estilos para la tabla */
table {
    width: 100%;
    border-collapse: collapse;
    color: black; /* Cambiar el color del texto a negro */
    -webkit-text-stroke: 1px black;
    text-stroke: 1px black; /* Ancho y color del borde */
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
</head>
<body>

<div class="container">
    <h2>Listado de Almacenes</h2>
    <div class="menu">
        <a href="agregar_almacen.php"><img src="http://localhost/constructora/login/abml/aCSS/agregar.png"></a>
        <a href="buscar_almacen.php"><img src="http://localhost/constructora/login/abml/aCSS/buscar.png"></a> 
        <a href="http://localhost/constructora/login/ingreso.php"><img src="http://localhost/constructora/login/abml/aCSS/volver.png"></a>
    </div>
</div>

<table border="3">
    <tr>
        <th>Número de Estante</th>
        <th>Sección</th>
        <th>Capacidad Máxima</th>
        <th>Observaciones</th>
        <th>Acciones</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['numeroEstante']; ?></td>
            <td><?php echo $row['seccion']; ?></td>
            <td><?php echo $row['capacidadMaxima']; ?></td>
            <td><?php echo $row['observaciones']; ?></td>
            <td>
                <a href="modificar_almacen.php?id=<?php echo $row['id_almacen']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/modificar.png"></a> |
                <a href="eliminar_almacen.php?id=<?php echo $row['id_almacen']; ?>"><img src="http://localhost/constructora/login/abml/aCSS/eliminar.png"></a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
</body>
</html>
