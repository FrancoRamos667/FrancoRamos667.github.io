<?php

$host = "localhost"; 
$usuario = "root"; 
$contraseña = ""; 
$base_de_datos = "constructora"; 


$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
?>
