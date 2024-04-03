<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_avanceObra = $_GET["id"];

    // Consulta SQL para obtener los datos del avance de obra con el ID proporcionado
    $query = "SELECT * FROM avancesobras WHERE id_avanceObra='$id_avanceObra'";
    $result = mysqli_query($conexion, $query);

    // Verificar si se encontró un avance de obra con el ID proporcionado
    if (mysqli_num_rows($result) == 1) {
        $avanceObra = mysqli_fetch_assoc($result);
    } else {
        echo "Avance de obra no encontrado.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_avanceObra = $_POST["id_avanceObra"];
    $fechaAvance = $_POST["fechaAvance"];
    $descripcionAvance = $_POST["descripcionAvance"];

    // Actualizar los datos del avance de obra en la base de datos
    $query = "UPDATE avancesobras SET fechaAvance='$fechaAvance', descripcionAvance='$descripcionAvance' WHERE id_avanceObra='$id_avanceObra'";
    mysqli_query($conexion, $query);

    header("Location: avanceObra.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Avance de Obra</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Avance de Obra</h2>
    <form action="modificar_avanceObra.php" method="post">
        <input type="hidden" name="id_avanceObra" value="<?php echo $avanceObra['id_avanceObra']; ?>">
        <label for="fechaAvance">Fecha del Avance:</label>
        <input type="date" id="fechaAvance" name="fechaAvance" value="<?php echo $avanceObra['fechaAvance']; ?>" required><br><br>
        <label for="descripcionAvance">Descripción del Avance:</label>
        <textarea id="descripcionAvance" name="descripcionAvance" required><?php echo $avanceObra['descripcionAvance']; ?></textarea><br><br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <a href="avanceObra.php">Volver a Avances de Obras</a>
</body>
</html>
