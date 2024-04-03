<?php
include 'conexion2.php';

// Verificar si se ha enviado un ID de asignación de contratista por método GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_asignacionContratista = $_GET["id"];

    // Consultar la asignación de contratista correspondiente al ID proporcionado
    $query = "SELECT * FROM asignacionescontratistas WHERE id_asignacionContratista = $id_asignacionContratista";
    $result = mysqli_query($conexion, $query);

    // Verificar si se encontró la asignación de contratista
    if ($result && mysqli_num_rows($result) > 0) {
        // Obtener los datos de la asignación de contratista
        $asignacionContratista = mysqli_fetch_assoc($result);
    } else {
        // Si no se encontró la asignación de contratista, redirigir a la página principal de asignaciones de contratistas
        header("Location: asignacionContratista.php");
        exit();
    }
} else {
    // Si no se proporcionó un ID de asignación de contratista, redirigir a la página principal de asignaciones de contratistas
    header("Location: asignacionContratista.php");
    exit();
}

// Procesar la modificación de la asignación de contratista
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $id_contratista = $_POST["id_contratista"];
    $id_proyectoObra = $_POST["id_proyectoObra"];

    // Actualizar la asignación de contratista en la base de datos
    $query = "UPDATE asignacionescontratistas SET id_contratista = '$id_contratista', id_proyectoObra = '$id_proyectoObra' WHERE id_asignacionContratista = $id_asignacionContratista";
    mysqli_query($conexion, $query);

    // Redirigir a la página principal de asignaciones de contratistas
    header("Location: asignacionContratista.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Asignación de Contratista</title>
    <link rel="stylesheet" type="text/css" href="../\..\aCSS\styleModificar.css">
</head>
<body>
    <h2>Modificar Asignación de Contratista</h2>
    <form action="modificar_asignacionContratista.php?id=<?php echo $id_asignacionContratista; ?>" method="post">
        <label for="id_contratista">Número de Contratista:</label>
        <input type="text" id="id_contratista" name="id_contratista" value="<?php echo $asignacionContratista['id_contratista']; ?>" required><br><br>
        <label for="id_proyectoObra">Número de Proyecto/Obra:</label>
        <input type="text" id="id_proyectoObra" name="id_proyectoObra" value="<?php echo $asignacionContratista['id_proyectoObra']; ?>" required><br><br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <a href="asignacionContratista.php">Volver a Asignaciones de Contratistas</a>
</body>
</html>
