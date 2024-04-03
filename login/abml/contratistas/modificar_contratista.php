<?php
include 'conexion2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_contratista = $_POST["id_contratista"];
    $nombre_contratista = $_POST["nombre_contratista"];
    $especialidad = $_POST["especialidad"];

    $query = "UPDATE contratistas SET contratista='$nombre_contratista', especialidad='$especialidad' WHERE id_contratista='$id_contratista'";
    mysqli_query($conexion, $query);

    header("Location: contratista.php");
    exit();
}

if (isset($_GET["id"])) {
    $id_contratista = $_GET["id"];
    $query = "SELECT * FROM contratistas WHERE id_contratista='$id_contratista'";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: contratista.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Contratista</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleAgregar.css">
</head>
<body>
    <h2>Modificar Contratista</h2>
    <form action="modificar_contratista.php" method="post">
        <input type="hidden" name="id_contratista" value="<?php echo $row['id_contratista']; ?>">
        <label for="nombre_contratista">Nombre del Contratista:</label>
        <input type="text" id="nombre_contratista" name="nombre_contratista" value="<?php echo $row['contratista']; ?>" required><br><br>
        <label for="especialidad">Especialidad:</label>
        <input type="text" id="especialidad" name="especialidad" value="<?php echo $row['especialidad']; ?>" required><br><br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <a href="contratista.php">Cancelar</a>
</body>
</html>
