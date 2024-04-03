<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body{
            background-color: #000;
            height: 100vh; /* Ajustar la altura del cuerpo para que ocupe toda la ventana */
            display: flex; /* Usar flexbox para centrar verticalmente el contenido */
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
            margin: 0; /* Eliminar el margen predeterminado */
            padding: 0; /* Eliminar el relleno predeterminado */
        }

        .error-message {
            background-color: #000;
            color: #ffcccc;
            border: 2px solid #cc0000;
            padding: 20px;
            border-radius: 10px;
            font-size: 18px;
            text-align: center;
        }

    </style>
</head>
<body>
    
<?php
// Incluir archivo de conexión
include 'conexion.php';

// Verificar si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y escapar caracteres especiales para evitar inyección SQL
    $usuario = mysqli_real_escape_string($conexion, $_POST["usuario"]);
    $contraseña = mysqli_real_escape_string($conexion, $_POST["contraseña"]);

    // Consulta SQL para verificar las credenciales del usuario
    $query = "SELECT * FROM login WHERE usuario='$usuario' AND contraseña='$contraseña'";

    // Ejecutar la consulta
    $result = mysqli_query($conexion, $query);

    // Verificar si se encontraron registros
    if (mysqli_num_rows($result) == 1) {
        // Iniciar sesión y redirigir a la página de ingreso si las credenciales son correctas
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: ingreso.php");
        exit; // Terminar el script para evitar ejecución adicional
    } else {
        // Credenciales incorrectas
        echo "<div class='error-message'>Usuario o contraseña incorrectos. Redireccionando...</div>";
    }

    // Liberar el resultado
    mysqli_free_result($result);
}

// Cerrar la conexión
mysqli_close($conexion);

// Redireccionamiento automático a login.html después de 4 segundos
header("refresh:3;url=login.html");
?>
</body>
</html>
